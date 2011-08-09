<?PHP

/*
 * To run this file the variable $picasa_albumid has to be set.
 */
include("header.php");
//set_include_path("lib;".  get_include_path());
$me = basename($_SERVER['PHP_SELF']);

if ($me == "picasa_list_albumphotos.php") {
  include_once("cfg/config.inc.php");
}

$picasa_albumid="5559755528655586209";
print_r($picasa_albumid);
echo "<br />ALBUMID: $picasa_albumid<br />";
if (!isset($picasa_albumid)) {
  echo "WARNUNG: Album ID (picasa_ablumid) ist nicht gesetzt.<br />";
  exit(1);
}/*
 * Load Zend framework for handling picasa web albums
 */
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_Photos_UserQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_AlbumQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_PhotoQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');

$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
$user = $google_picasa_user;
$pass = $google_picasa_pass;

$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);

// update the second argument to be CompanyName-ProductName-Version
$gp = new Zend_Gdata_Photos($client);
$query = $gp->newAlbumQuery();
$query->setUser(str_replace("@gmail.com", "", $google_picasa_user));
$query->setAlbumID($picasa_albumid);

try {
  $i = 0;
  echo "<table border=0>";
  $albumFeed = $gp->getAlbumFeed($query);
  //echo "<h3 class='main'>" . $albumFeed->getTitle()->getText(). "</h3>\n";
  foreach ($albumFeed as $albumEntry) {
    if ($albumEntry->getMediaGroup()->getThumbnail() != null) {
      $url = $albumEntry->getLink('alternate')->href;
      //echo $url . "\n";
      $mediaThumbnailArray = $albumEntry->getMediaGroup()->getThumbnail();
      $ThumbnailUrl = $mediaThumbnailArray[0]->getUrl();
      $ThumbnailHeight = $mediaThumbnailArray[0]->getHeight();
      $ThumbnailWidth = $mediaThumbnailArray[0]->getWidth();
      // Load Picture Info
      $mediaArray = $albumEntry->getMediaGroup()->getContent();
      $ImageUrl = $mediaArray[0]->getUrl();
      $sImageTitle = $albumEntry->getMediaGroup()->getDescription()->text;
      $url = $albumEntry->getLink('alternate')->href;
      $rest = $i % 4;
      if ($rest == 0) {
        echo "<tr><td width=120>";
      } else {
        echo "<td width=120>";
      }
      /*
       * show the thumbnail pictures
       */
      echo "<a class='main' href='$ImageUrl' title='$sImageTitle' " .
      "rel='lytebox['group']>" .
      "<img  class='etkag' border='0' src='$ThumbnailUrl' width='$ThumbnailWidth' height='$ThumbnailHeight'></a>";
      echo "<div class='pictext_left'>$sImageTitle</div>";

      if ($rest == 3) {
        echo "</td></tr>";
      } else {
        echo "</td>";
      }
      $i++;
    }
  }
  echo "</table>";
} catch (Zend_Gdata_App_Exception $e) {
  echo $e->getMessage();
  echo "Der Picasa Service von Google steht im Moment nicht zur Verfügung.<br />\n";
  $fh = fopen($google_picasa_log, "a+");
  fwrite($fh, $date("d.m.Y H:i:s") . " " . $me . " > " . $e->getMessage());
  fclose($fh);
}
?>
