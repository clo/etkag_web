<?PHP

/**
 * Description of InfoParsing
 *
 * @author Christian Lochmatter
 */
class InfoParsing {

  private $base = "..";
  //for unix like system
  private $defNewline = "##";
  //for winows like system
  //private $defNewline = "\\\\";
  public $line = "";
  public $doc = null;
  private $_tableHeader = false;
  private $_tableOpenTag = false;
  private $_tableCloseTag = false;
  private $_tableMiddle = false;
  private $_title = true;
  private $_basedir = "";
  
  function __construct(&$doc) {
    $this->doc = $doc;
  }

  public function parse(&$line) {
    $this->line = $line;
    $this->removeComment();
    $this->doHeaderParsing();
    //$this->doTableParsing();
    $this->doDocumentParsing();
    $this->doPictureParsing();
    $this->doLinkParsing();
    $this->doLinkExternParsing();
    $this->doReferenceParsing();
    $this->doReferenceObjectParsing();
    $this->doBoldParsing();
    $this->doNumberingParsing();
    $this->doHtmlParsing();
    $this->doNewlineParsing();
    return $this->line;
  }

  private function doHeaderParsing() {
    if ($this->_title) {
      $this->line = "<h3 class='contenttitle'>".$this->line."</h3>\n";
      $this->_title = false;
    }
    preg_match_all("/(=.*?=)/", $this->line, $matches);
    foreach ($matches[1] as $header) {
      $header = trim($header);
      $orig = $header;
      $header = preg_replace("/^=/", "<h3 class='contenttitle'>", $orig);
      $header = preg_replace("/=$/", "</h3>", $header);
      $this->line = str_replace($orig, $header, $this->line);
    }

  }

  private function removeComment() {
    preg_match_all("/(^'.*?$)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $orginal = $link;
      $this->line = "";
    }
  }

  private function doPictureParsing() {
    preg_match_all("/(#BILD:?.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = preg_replace("/#BILD:?/", "", $link);
      $link = preg_replace("/#/", "", $link);
      preg_match("/.*KOL=([1-4]).*/", $link, $m);
      if (count($m[1]) > 0) {
        $nrOfColumns = $m[1];
      } else {
        $nrOfColumns = null;
      }
      preg_match("/.*BREITE=([0-9]*).*/", $link, $m);
      if (count($m[1]) > 0) {
        $width = $m[1];
      } else {
        $width = null;
      }
      preg_match("/(.*\.JPG|.*\.jpg)/", $link, $m);
      if (count($m[1]) > 0) {
        $picture = $m[1];
      } else {
        $picture = "";
      }
      //get pictures from the current directory
      if (empty($picture)) {
        $this->doc->listPicture($nrOfColumns, $width);
        $newlink = "";
      } else {
        $newlink = $this->doc->getPicture($picture,$width);
      }
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doDocumentParsing() {
    preg_match_all("/(#DOKUMENT:?.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = preg_replace("#/DOKUMENT:?/", "", $link);
      $link = preg_replace("/#/", "", $link);
      //get documents from the current directory
      $this->doc->listDocument();
      $newlink = "";
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doHtmlParsing() {
    preg_match_all("/(#HTML.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = str_replace("#HTML:", "", $link);
      $link = str_replace("#", "", $link);
      $newlink = $link;
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doTableParsing() {
    $matched = false;
    //erstes zeichen
    preg_match_all("/(^\|)/", $this->line, $matches);
    if (!$this->_tableOpenTag && !$this->_tableCloseTag) {
      foreach ($matches[1] as $link) {
        $this->line = preg_replace("/(^\|)/", "<tr><td nowrap>", $this->line);
        $this->line = "<table border='0'>" . $this->line;
        $this->_tableOpenTag = true;
      }
      $matched = true;
    }
    //letztes zeichen
    preg_match_all("/(\|(\\\\n|\\\\r\\\\n)$)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      //$this->line = preg_replace("/(\|($|\\\\n|\\\\r\\\\n))/", "</td></tr>", $this->line);
      $this->line = preg_replace("/(\|##/", "</td></tr>", $this->line);
      $matched = true;
    }
    //mittleres zeichen
    if ($this->_tableOpenTag && !$this->_tableCloseTag) {
      preg_match_all("/(\|)/", $this->line, $matches);
      foreach ($matches[1] as $link) {
        $this->line = preg_replace("/\|/", "</td><td>", $this->line);
        $matched = true;
      }
    }
    //$this->line = str_replace($origlink, $link, $this->line);
    //tabelle fertig?
    if (!$this->_tableCloseTag && $this->_tableOpenTag) {
      $this->line .= "</table>";
      $this->_tableCloseTag = true;
    }

    if ($this->_tableCloseTag && $this->_tableOpenTag) {
      $this->_tableCloseTag = false;
      $this->_tableOpenTag = false;
    }
  }

  private function doLinkParsing() {
    preg_match_all("/(#LINK:.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = str_replace("#LINK:", "", $link);
      $link = str_replace("#", "", $link);
      if (preg_match("/\|/", $link)) {
        list($site, $sitedescription) = explode("|", $link);
      } else {
        $site = $link;
        $sitedescription = $link;
      }
      $pos = menu::getPositionBySite($site);
      $newlink = "<a href='index.php?site=$site&amp;pos=$pos&amp;level=' class='main'>" . ucfirst($this->doc->insertUmlaut($sitedescription)) . "</a>\n";
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doLinkExternParsing() {
    preg_match_all("/(#LINKEXTERN:.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = str_replace("#LINKEXTERN:", "", $link);
      $link = str_replace("#", "", $link);
      if (preg_match("/|/", $link)) {
        list($url, $description) = explode("|", $link);
      } else {
        $url = $link;
        $description = $link;
      }
      $newlink = "<a href='http://$url' class='main'>" . ucfirst($description) . "</a>";
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doReferenceParsing() {
    preg_match_all("/(#REFERENZ.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = str_replace("#REFERENZ", "", $link);
      $link = str_replace("#", "", $link);
      $this->doc->listReference();
      $newlink = "";
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doReferenceObjectParsing() {
    preg_match_all("/(#REFOBJEKT:.*?#)/", $this->line, $matches);
    foreach ($matches[1] as $link) {
      $origlink = $link;
      $link = str_replace("#REFOBJEKT:", "", $link);
      $link = str_replace("#", "", $link);
      preg_match("/.*DIR=(.*)/", $link, $m);
      if (!empty($m[1])) {
        $dir = $m[1];
        $this->doc->listReferenceObject($this->_basedir."/".$dir);
      }
      $newlink = "";
      $this->line = str_replace($origlink, $newlink, $this->line);
    }
  }

  private function doBoldParsing() {
    preg_match_all("/(\*.*?\*)/", $this->line, $matches);
    foreach ($matches[1] as $bold) {
      $bold = trim($bold);
      $orig = $bold;
      $bold = preg_replace("/^\*/", "<b>", $orig);
      $bold = preg_replace("/\*$/", "</b>", $bold);
      $this->line = str_replace($orig, $bold, $this->line);
    }
  }

  private function doNumberingParsing() {
    preg_match_all("/(\~.*?\~)/", $this->line, $matches);
    //dump($matches);
    foreach ($matches[1] as $bold) {
      $bold = trim($bold);
      $orig = $bold;
      $bold = preg_replace("/^~/", "<li>", $orig);
      $bold = preg_replace("/~$/", "</li>", $bold);
      $this->line = str_replace($orig, $bold, $this->line);
    }
  }

  private function doNewlineParsing() {
    $this->line = str_replace($this->defNewline, "<br />", $this->line);
  }

  public function setTitle($enable){
    $this->_title = $enable;
  }

  public function setBaseDir($dir){
    $this->_basedir = $dir;
  }

}

?>
