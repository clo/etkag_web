<?PHP

class doc {

  var $path = "";
  var $debug = false;
  var $newline = "\n";
  var $content = "";
  var $pathCfg = null;

  function doc($path="") {
    global $g_content, $g_path_cfg;
    $this->path = $path;
    $this->content = $g_content;
    $this->pathCfg = $g_path_cfg;
  }

  function setDebug($debug=true) {
    $this->debug = $debug;
  }

  function enableDebug() {
    $this->setDebug(true);
  }

  function disableDebug() {
    $this->setDebug(false);
  }

  function getDate($dir, $format='d.m.Y') {
    if (!empty($dir) && !is_null($dir)) {
      preg_match('/^([0-9]{6})(.*)$/i', $dir, $target);
      return date($format, mktime(0, 0, 0, substr($target[0], 2, 2), substr($target[0], 0, 2), substr($target[0], 4, 4)));
    } else {
      return null;
    }
  }

  function getPictureSrc($file) {
    if (is_file($file)) {
      return "&nbsp;<a class=main rel=\"lytebox['group']\" onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" href='$file' target='_new'><img src='img/lupe.jpg' border=0></a>";
    } else {
      return null;
    }
  }

  function getFileTypeSymbol($type) {
    if (eregi("jpg", $type)) {
      $pic = 'img/jpg.png';
    }
    if (eregi("pdf", $type)) {
      $pic = 'img/pdf.png';
    }
    return "<img src='" . $pic . "' border=0>&nbsp;";
  }

  function getFileType($filename) {
    preg_match('/\.(.*$)/', $filename, $result);
    return $result[1];
  }

  function getFolders($dir=null, $sort=true) {
    if (empty($dir)) {
      $dir = $this->path;
    }
    if ($this->debug) {
      echo "DEBUG: $dir" . $this->newline;
    }
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        $dir_arr = array();
        $i = 0;
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != "..") {
            $index = '';
            $index = $this->getInfoText($dir . "/" . $file, 'datum');
            if (empty($index)) {
              $index = '10000101';
            } else {
              $index = substr($index, 6, 4) . substr($index, 3, 2) . substr($index, 0, 2);
            }
            $dir_arr[$index . '_' . $i] = $file;
            if ($this->debug) {
              echo "DEBUG: $dir/$file" . $this->newline . "<br>";
            }
            $i++;
          }
        }
        closedir($dh);
      }
    } else {
      echo "Verzeichnis $dir existiert nicht.";
      exit();
    }
    if ($sort) {
//krsort($dir_arr);
      $dir_arr = $this->sortArr($dir_arr);
    }
    return $dir_arr;
  }

  function getFoldersWithDate($dir=null, $sort=true) {
    if (empty($dir)) {
      $dir = $this->path;
    }
    if ($this->debug) {
      echo "DEBUG: $dir" . $this->newline;
    }
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        $dir_arr = array();
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != "..") {
            $index = substr($file, 4, 4) . substr($file, 2, 2) . substr($file, 0, 2);
            $dir_arr[$index] = $file;
            if ($this->debug) {
              echo "DEBUG: $dir/$file" . $this->newline . "<br>";
            }
          }
        }
        closedir($dh);
      }
    }
    if ($sort) {
      krsort($dir_arr);
    }
    return $dir_arr;
  }

  function getFiles_new($dir=null, &$file_arr, $include=".*", $exclude=".*") {
    if (empty($dir)) {
      $dir = $this->path;
    }
    $this->debug($dir);
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != ".") {
            if (is_file($dir . "/" . $file) && preg_match("/$include/", $file) && !eregi("/$exclude/", $file)) {
              if ($this->debug)
                echo "FILE: " . $dir . "/" . $file . $this->newline;
              $file_arr[] = $dir . "/" . $file;
            }else {
              $this->getFiles_new($dir . "/" . $file, $file_arr, $include, $exclude);
            }
          }
        }
        closedir($dh);
      }
    }
  }

  function getFiles2($dir=null, &$file_arr, $include=".*", $exclude=".*", $recursive=false) {
    if (empty($dir)) {
      $dir = $this->path;
    }
    $this->debug($dir);
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != ".") {
            if (is_file($dir . "/" . $file) && preg_match("/$include/", $file) && !eregi("/$exclude/", $file)) {
              if ($this->debug)
                echo "FILE: " . $dir . "/" . $file . $this->newline;
              $file_arr[] = $dir . "/" . $file;
            }else {
              if ($recursive) {
                $this->getFiles_new($dir . "/" . $file, $file_arr, $include, $exclude);
              }
            }
          }
        }
        closedir($dh);
      }
    }
  }

  function getFiles_new2($dir, &$file_arr, $include=null, $exclude=null, $i=0) {
//$this->debug($dir);
    if ($i == 0) {
      $this->debug("Looking for pictures (D=$dir, I=$include, E=$exclude) ...", false);
    }
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != ".") {
            $this->getFiles_new2($dir . "/" . $file, $file_arr, $include, $exclude, ++$i);
            $i--;
          }
        }
        closedir($dh);
      }
    } elseif (is_file($dir)) {
      if (!is_null($include) && is_null($exclude)) {
        if (is_file($dir) && preg_match($include, $dir)) {
          $file_arr[] = $dir;
        }
      } elseif (is_null($include) && !is_null($exclude)) {
        if (is_file($dir) && !preg_match($exclude, $dir)) {
          $file_arr[] = $dir;
        }
      } elseif (!is_null($include) && !is_null($include)) {
        if (is_file($dir) && preg_match($include, $dir) && !preg_match($exclude, $dir)) {
          $file_arr[] = $dir;
        }
      } elseif (is_null($include) && is_null($include)) {
        if (is_file($dir)) {
          $file_arr[] = $dir;
        }
      }
    }
    if ($i == 0) {
      count($file_arr) > 1 ? $picture = "pictures" : $picture = "picture";
      $this->debug(".. done [ " . count($file_arr) . " " . $picture . " ]");
    }
  }

  function listdir($start_dir='.') {
    $files = array();
    if (is_dir($start_dir)) {
      $fh = opendir($start_dir);
      while (($file = readdir($fh)) !== false) {
# loop through the files, skipping . and .., and recursing if necessary
        if (strcmp($file, '.') == 0 || strcmp($file, '..') == 0)
          continue;
        $filepath = $start_dir . '/' . $file;
        if (is_dir($filepath))
          $files = array_merge($files, $this->listdir($filepath));
        else
          array_push($files, $filepath);
      }
      closedir($fh);
    } else {
# false if the function was called with an invalid non-directory argument
      $files = false;
    }
  }

  function getFiles($dir=null, $include=".*") {
    if (empty($dir) || is_null($dir)) {
      $dir = $this->path;
    }
    if ($this->debug) {
      print "DEBUG: " . $dir;
    }
    $file_arr = array();
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != "." && $file != "info.txt") {
            if (preg_match("/$include/i", $file)) {
              if ($this->debug) {
                print $file . $this->newline;
              }
              $index = str_replace("etkag_", "", $file);
              $file_arr[$index] = $file;
//$file_arr[] = $file;
            }
          }
        }
        closedir($dh);
      }
    }
    ksort($file_arr, SORT_NUMERIC);
    return $file_arr;
  }

  function getInfoText($dir=null, $col='', $action='SINGLE') {
    if (empty($dir)) {
      $dir = $this->path;
    }
    if ($action == 'SINGLE') {
      if (is_file($dir . "/info.txt")) {
        $fh = fopen($dir . "/info.txt", "r");
        $content = fread($fh, filesize($dir . "/info.txt"));
        $file_arr = explode("\n", $content);
        foreach ($file_arr as $key => $val) {
          if (!preg_match("/^#|^'/", $val)) {
            list($k, $v) = $this->split_single("=", $val);
            $info_arr[$k] = $v;
          }
        }
        fclose($fh);
        if (empty($col)) {
          return $info_arr;
        } else {
          if (isset($info_arr[$col])) {
            return $info_arr[$col];
          } else {
            return null;
          }
        }
      } else {
        return null;
      }
    } elseif ($action = 'MULTIPLE') {
      if (is_file($dir . "/info.txt")) {
        $fh = fopen($dir . "/info.txt", "r");
        $content = fread($fh, filesize($dir . "/info.txt"));
        $file_arr = explode("\n", $content);
        $i = 0;
        foreach ($file_arr as $key => $val) {
          $val = rtrim($val);
//list($k,$v) = split("=",$val);
          if (!preg_match("/^#|^'/", $val)) {
            list($k, $v) = $this->split_single("=", $val);
            $info_arr[$i][$k] = $v;
            if ($val == '') {
              $i++;
            }
          }
        }
        fclose($fh);
        if (empty($col)) {
          return $info_arr;
        } else {
          return $info_arr[$col];
        }
      } else {
        return null;
      }
    }
  }

  function getDetailInformation($file, $match) {
    $matched = false;
    $retVal = array();
    $fh = fopen($file . '/info.txt', "r");
    while (!feof($fh)) {
      $line = trim(fgets($fh));
      if (preg_match("/$match/", $line)) {
        $matched = true;
      }
      if ($line == '') {
        $matched = false;
      }
      if ($matched) {
        list($k, $v) = $this->split_single("=", $line);
//if (preg_match("/detail_/",$k)){
        $retVal[$k] = $v;
//}
      }
    }
    fclose($fh);
    return $retVal;
  }

  function split_single($needle, $val) {
    $pos = strpos($val, $needle);
    $v = substr($val, 0, $pos);
    $w = substr($val, $pos + 1);
    return array($v, $w);
//todo:$v = strpo
  }

  function getFileContent($file) {
    if (is_file($file)) {
      $fh = fopen($file, "r");
      $content = fread($fh, filesize($file));
      $content = str_replace("\n", "<br>", $content);
      fclose($fh);
      return $content;
    } else {
      return null;
    }
  }

  function docAvailable($dir=null, $include="") {
    if (empty($dir)) {
      $dir = $this->path;
    }
    $available = false;
    if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != ".") {
            if (!empty($include)) {
              if (eregi($include, $file)) {
                return true;
              } else {
                return false;
              }
            } else {
              $available = true;
              return $available;
            }
          }
        }
        closedir($dh);
      } else {
        echo "ERROR: docAvailable - Verzeichnis nicht vorhanden." . $this->newline;
      }
    }
    return $available;
  }

  function sortArr($arr) {
    $retArr = array();
    if (!empty($arr)) {
      foreach ($arr as $val) {
        $retArr[substr($val, 4, 4) . substr($val, 2, 2) . substr($val, 0, 2)] = $val;
      }
    }
    krsort($retArr, SORT_REGULAR);
    return $retArr;
  }

  function formatLinkName($link, $remLeadingNumber=false, $umlaut=true, $remLeadingString="", $dir="", $info=false, $remPost=false) {
    $link_original = $link;

    if ($remLeadingNumber) {
      preg_match('/^[0-9]*(.*)$/', $link, $target);
      $link = $target[1];
    }

    if (!empty($remLeadingString)) {
      $link = str_replace($remLeadingString, "", $link);
    }

    $link = str_replace("_", " ", $link);

    if ($umlaut) {
      $link = $this->insertUmlaut($link);
    }

    if ($info) {
      echo $dir;
      $fulllink = $dir . "/" . $link_original;

      $link = substr($link, 0, strlen($link) - strlen(filetype($fulllink)));
      $link .= "(" . filesize($fulllink) . ")";
    }

    if ($remPost) {
//print filetype($link);
//$link = substr($link,0,strlen($link)-strlen(filetype($link)));
      preg_match("/.*\.(.*)/", $link, $target);
      $filetype = $target[1];
      $link = substr($link, 0, strlen($link) - strlen($filetype) - 1);
    }
    return $link;
  }

  function insertUmlaut($link) {
    $link = str_replace("ae", "&auml;", $link);
    $link = str_replace("h&auml;", "hae", $link);
    $link = str_replace("ue", "&uuml;", $link);
    $link = str_replace("e&uuml;", "eue", $link);
    $link = str_replace("oe", "&ouml;", $link);
    $link = str_replace("t&uuml;ll", "tuell", $link);
    return $link;
  }

  function replaceUmlaut($link) {
    $link = str_replace("ä", "ae", $link);
    $link = str_replace("ü", "ue", $link);
    $link = str_replace("eü", "eue", $link);
    $link = str_replace("ö", "oe", $link);
    $link = str_replace(" ", "_", $link);
    return $link;
  }

  function createDir($dir) {
    if (!is_dir($dir)) {
      if (!mkdir($dir)) {
        $this->debug('Directory creation failed: ' . $dir);
        exit;
      }
    }
  }

  function createDirViaWeb($dir) {
    if ($_SESSION['loggedin']) {
      if (!is_dir($dir)) {
        if (!mkdir($dir)) {
          $this->debug('Directory creation failed: ' . $dir);
          exit;
        }
      }
    }
  }

  function createDirRecursive($dir) {
    if (is_string($dir)) {
//$arr = split('\/',$dir);
      $arr = explode('\/', $dir);
      $this->createDirRecursive($arr);
    }
    if (is_array($dir)) {
      $dt = '';
      foreach ($dir as $d) {
        $dt .= $d;
        $this->createDir($dt);
        $dt .= '/';
      }
    }
  }

  function getDirAndFileName($dir) {
    $d = "";
    $f = "";
    $f = basename($dir);
    $d = dirname($dir);
    return array($d, $f);
  }

  function deleteFile($file) {
    $this->debug('deleting local ... ' . $file . ' ..', false);
    if (is_file($file)) {
      if (unlink($file)) {
        $this->debug('... done');
      } else {
        $this->debug('... failed');
      }
    } else {
      $this->debug('... skipped [ file does not exist ]');
    }
  }

  function replaceUserCharWithHtmlChar(&$msg) {
    $msg = str_replace("_dick_", "<b>", $msg);
  }

  function find_dir($path=null, $pattern=null, &$value) {
    global $g_content;
    if (is_null($path)) {
      $path = $g_content;
    }
    $dh = opendir($path);
    while (($file = readdir($dh)) !== false) {
      $fullname = $path . "/" . $file;
      if (is_dir($fullname) && preg_match($pattern, $fullname)) {
        $value = $fullname;
      }
      if (is_dir($fullname) && $file != ".." && $file != ".") {
        $this->find_dir($fullname, $pattern, $value);
      }
    }
    closedir($dh);
  }

  function getContentFromInfoFile($site) {
    global $g_info_file;
    $this->saveContent();
    //$start = date("U");
    $this->find_dir($this->content, "/\/$site$/", $dir);
    //$diff = date("U") - $start;
    //echo "TIME TO RUN find_dir: ".$diff;
    $file = "$dir/$g_info_file";
    if (empty($dir)) {
      $this->createDirViaWeb($this->content . "/" . $site);
    }
    if (empty($dir) && $_SESSION['loggedin']) {
      echo "WARNUNG: Verzeichnis $site existiert niergends unter $this->content.<br />\n";
      echo "<a class='main' href='index.php?site=" . $_GET['site'] . "&amp;action=create&amp;dir=$site'>Verzeichnis erstellen</a><br />\n";
    }
    if (!is_file($file)) {
      $this->createFileFromWeb("/htdocs/2011", $dir, $file);
    }
    if (is_file($file)) {
      $this->printEditButtonNew($dir, $g_info_file, $_GET['site']);
      $fh = fopen($file, "r");
      $content = fread($fh, filesize($dir . "/info.txt"));
      $file_arr = explode("\n", $content);
      $headerPrinted = false;
      echo "<span class='content'>\n";
      $this->path = $dir;
      $infoParsing = new InfoParsing($this);
      $infoParsing->setBaseDir($dir);
      foreach ($file_arr as $line) {
        echo $infoParsing->parse($line);
      }
      fclose($fh);
      echo "</span>";
    }
  }

  function saveContent() {
    global $g_backup_info_file_after_edit;
    if (isset($_POST['speichern']) && $_SESSION['loggedin']) {
//speichern
      if ($g_backup_info_file_after_edit) {
        $this->backupFile($_POST['file']);
      }
      $fh = fopen($_POST['file'], "w");
      fwrite($fh, $this->deescape($_POST['content']));
      fclose($fh);
    }
  }

  function deescape($content) {
    $os = PHP_OS;
    if (preg_match("/Linux/", $os)) {
      $content = str_replace("\'", "'", $content);
      $content = str_replace('\"', '"', $content);
    }
    return $content;
  }

  function createFile() {
    global $g_wiki_help;
    $wikihelpfile = $g_wiki_help;
    if ($_GET['action'] == 'create' &&
            isset($_GET['file']) &&
            $_SESSION['loggedin']) {
      if (!file_exists($wikihelpfile)) {
        echo "WARNUNG: Datei $wikihelpfile existiert nicht!<br />";
      } else {
        $fh = fopen($_GET['file'], "w+");
        $fhInit = fopen($wikihelpfile, "r");
        $content = fread($fhInit, filesize($wikihelpfile));
        fwrite($fh, $content);
        fclose($fh);
        fclose($fhInit);
      }
    }
  }

  function createFileFromWeb($base, $dir, $file) {
    global $g_wiki_help, $cfg_ftp_pw, $cfg_ftp_un, $cfg_ftp_host;
    $wikihelpfile = $g_wiki_help;
    if (!file_exists($wikihelpfile)) {
      echo "WARNUNG: Datei $wikihelpfile existiert nicht!<br />";
    } else {
      if ($ftp = ftp_connect($cfg_ftp_host)) {
        if (ftp_login($ftp, $cfg_ftp_un, $cfg_ftp_pw)) {
          ftp_pasv($ftp, 1);
          ftp_chdir($ftp, $base);
          if (!ftp_chdir($ftp, $dir)) {
            ftp_mkdir($ftp, $dir);
            echo("Directory $dir created ok");
            ftp_site($ftpstream, "CHMOD 0777 $base/$dir/$file");
            $fp = fopen($base . '/$dir/$file', 'w');
            fputs($fp, 'Learnt this at PHPSense.com');
            fclose($fp);
          }
        }
        ftp_close($ftp);
      }
    }
  }

  function createFileFromWebOLD($file) {
    global $g_wiki_help;
    $wikihelpfile = $g_wiki_help;
    if (!file_exists($wikihelpfile)) {
      echo "WARNUNG: Datei $wikihelpfile existiert nicht!<br />";
    } else {
//echo "UMASK: " . umask() . "<br />\n";
//echo "DIR: " . dirname($file) . "<br />\n";
      chmod(dirname($file), 0755);
      $fh = fopen($file, "w+");
      chmod($file, 0755);
      $fhInit = fopen($wikihelpfile, "r");
      $content = fread($fhInit, filesize($wikihelpfile));
      fwrite($fh, $content);
      fclose($fh);
      fclose($fhInit);
      $fh = fopen($file, "r");
      fclose($fh);
      if (file_exists($file) && is_file($file)) {
        echo "WARNUNG: $file konnte nicht erstellt werden.<br />\n";
      } else {
        echo "INFO: $file wurde erfolgreich erstellt.<br />\n";
      }
    }
  }

  function listInfoFiles($dir) {
    global $g_info_file;
    list($filename, $type) = explode(".", $g_info_file);
    $dh = opendir($dir);
    while (($file = readdir($dh)) !== false) {
      if ($file != "." && $file != "..") {
        if (preg_match("/" . $filename . "_[0-9]{14}_?.*." . $type . "/", $file)) {
          echo "$file<br>\n";
        }
      }
    }
    closedir($dh);
  }

  function backupFile($file) {
    global $g_info_file;
    $dir = dirname($file);
    list($filename, $type) = explode(".", $g_info_file);
    $filenamenew = $dir . "/" . $filename . "_" . date("YmdHis") . "_" . $_SESSION['username'] . "." . $type;
    $fh = fopen($file, "r");
    $content = fread($fh, filesize($file));
    $fh = fclose($fh);
    $fhnew = fopen($filenamenew, "w+");
    fwrite($fhnew, $content);
    fclose($fhnew);
  }

  function printContentFromInfoFile(
  $file) {
    if (is_file($file)) {
      $fh = fopen($file, "r");
      $content = fread($fh, filesize($file));
      $file_arr = explode("\n", $content);
      $firstline = true;
      echo "<span class='content'>";
      foreach ($file_arr as $line) {
        if ($firstline) {
          echo "<h3 class='contenttitle'>$line</h3>";
          $firstline = false;
        } else {
          echo "$line";
        }
      }
      fclose($fh);
      echo "</span>";
    } else {
      echo "WARNUNG: Es existiert keine Beschreibung für diesen Bereich.";
    }
  }

  function printEditButton($file, $site) {
    if ($_SESSION['loggedin']) {
      $pos = menu::getPositionBySite($site);
      echo "<a class='main' href='index.php?site=edit&amp;file=$file&amp;dir=$site&amp;pos=$pos'>Anpassen</a><br />\n";
    }
  }

  function printEditButtonNew($dir, $file, $site) {
    if (isset($_SESSION['loggedin'])) {
      if ($_SESSION['loggedin']) {
        $pos = menu::getPositionBySite($site);
        echo "<div align='left'><a class='main' href='index.php?site=edit_new&amp;file=$file&amp;dir=$dir&amp;pos=$pos&amp;sitefrom=$site'>Anpassen</a></div>\n";
      }
    }
  }

  public function listDocument() {
    global $g_document_to_show;
    $file_arr = $this->getFiles(null, $g_document_to_show);
    if (!empty($file_arr)) {
      foreach ($file_arr as $key => $file) {
        if (preg_match("/php$/", $file)) {
          include($base . "/" . $_GET['dir'] . "/" . $file);
        } else {
          $linkname = $this->formatLinkName($file, false, true, "", "", false, true);
          $pic = $this->getFileTypeSymbol($this->getFileType($file));
          echo "$pic&nbsp;
    <a class=main href='" . $this->path . "/" . $file . "' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a><br />";
        }
      }
    }
  }

  public function listReference() {
    if ($this->docAvailable()) {
      $pos = menu::getPositionBySite($_GET['site']);
      echo "<a class=main href='index.php?site=referenzen&dir=" . $_GET['site'] . "&pos=$pos' target='_top'>Referenzen</a>";
    }
  }

  public function listReferenceObject($dir) {
    global $g_info_file,$g_picture_width_referenceobject;
    $this->path = $dir;
    if ($this->docAvailable()) {
      $text = $this->getFileContent($dir . "/" . $g_info_file);
      echo "<table class='main' width='800'>\n";
      echo "<tr>";
      echo "<td widht='400' nowrap>";
      $aText = preg_split("/\\\r|\\\n|\\\r\\\n/", $text);
      echo "<table class='main'>";
      foreach ($aText as $v) {
        list($var, $val) = preg_split("/:|=|;/", $v);
        echo "<tr valign='top' nowrap><td width='200'><b>".trim($var)."</b></td><td>:</td>\n";
        echo "<td width='200' nowrap>".trim($val)."</td></tr>\n";
      }
      echo "</table>";
      echo "</td>";
      echo "<td width='400' valign='middle'>";
      $this->listPicture(2,$g_picture_width_referenceobject);
      echo "</td>";
      echo "</tr>";
      echo "</table>\n";
    }
  }

  function listPicture($nrOfColumn, $picturewidth) {
    global $g_picture_to_show, $g_nr_of_picture_per_line, $g_picture_width,
    $g_table_content_width, $g_lytebox;
    if (is_null($nrOfColumn)) {
      $nrOfColumn = $g_nr_of_picture_per_line;
    }
    if (is_null($picturewidth)) {
      $picturewidth = $g_picture_width;
    }
    echo "<table class='contentpicture'>";
    if ($this->docAvailable()) {
      $file_arr = $this->getFiles(null, $g_picture_to_show);
      $i = 0;
      $width = $g_table_content_width / $nrOfColumn;
      $aKey = array_keys($file_arr);
      for ($i = 0; $i <= count($aKey); $i++) {
        $rest = $i % $nrOfColumn;
        if (isset($file_arr[$aKey[$i]])) {
          if ($rest == 0) {
            echo "<tr><td width='$width'>\n";
          } else {
            echo "<td width='$width'>\n";
          }
          /*
           * show the thumbnail pictures
           */

          if (is_file($this->path . "/" . $file_arr[$aKey[$i]])) {
            $linkname = $this->formatLinkName($file_arr[$aKey[$i]], true, true, "etkag_", null, false, true);
            $pic = $this->path . "/" . $file_arr[$aKey[$i]];
            echo "<a class='main' " .
            "href='" . $pic . "' " .
//"href='#'".
//"onclick='milkbox.openWithFile({ href:\"" . $pic . "\", title:\"$linkname\"}, {overlayOpacity:1, fileboxBorderWidth:'10px', fileboxBorderColor:'#ff0000', resizeDuration:1, resizeTransition:'bounce:out', centered:true})" .
            "title='$linkname' " .
//"rel='lytebox[group]'" .
//"rel='example3'" .
//"rel='quickbox'" .
            "$g_lytebox " .
            ">" .
            "<img class='etkag' border='0' src='" . $this->path . "/" . $file_arr[$aKey[$i]] . "' width='$picturewidth' alt='" . $file_arr[$aKey[$i]] . "' /></a>\n";
            echo "<br />\n";
            echo "<span class='pictext_left'>" . ucfirst($linkname) . "</span>\n";
          }
          if ($rest == 3) {
            echo "</td></tr>\n";
          } else {
            echo "</td>";
          }
        }
      }
      echo "</table>";
    }
  }

  function getPicture($picture, $picturewidth) {
    global $g_picture_width, $g_lytebox;
    if (is_null($picturewidth)) {
      $picturewidth = $g_picture_width;
    }
    $linkname = $this->formatLinkName($picture, true, true, "etkag_", null, false, true);
    $pic = $this->path . "/" . $picture;
    $link = "<a class='main' " .
            "href='" . $pic . "' " .
            "title='$linkname' " .
            "$g_lytebox " .
            ">" .
            "<img class='etkag' border='0' src='" . $pic . "' width='$picturewidth' alt='" . $picture . "' />" .
            "</a>\n";
    $link .= "<br />\n";
    $link .= "<span class='pictext_left'>" . ucfirst($linkname) . "</span>\n";
    return $link;
  }

  function debug($msg, $newline=true) {
    if ($this->debug) {
      echo $msg;
      $newline ? $nl = $this->newline : $nl = "";
      echo $nl;
    }
  }

  function dump($val) {
    echo

    "<pre>";
    print_r($val);
    echo "</pre>";
  }

}

?>