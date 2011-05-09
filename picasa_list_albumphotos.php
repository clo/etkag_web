<?PHP
session_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include("header.php");
set_include_path("lib;".  get_include_path());
error_reporting(E_ALL);
$me = basename($_SERVER['PHP_SELF']);

/*
 * Load Zend framework for handling picasa web albums
 */
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_Photos_UserQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_AlbumQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_PhotoQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
echo "Include Path: " . get_include_path()."<br />\n";

$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
$user = $google_picasa_user;
$pass = $google_picasa_pass;

$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);

// update the second argument to be CompanyName-ProductName-Version
$gp = new Zend_Gdata_Photos($client);
$query = $gp->newAlbumQuery();
$query->setUser(str_replace("@gmail.com","",$google_picasa_user));
$query->setAlbumName(str_replace(" ","",$_SESSION['albumname']));

try {
    $albumFeed = $gp->getAlbumFeed($query);
    foreach ($albumFeed as $albumEntry){
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
        echo "<a href='$ImageUrl' title='$sImageTitle' rel='lightbox'><img src='$ThumbnailUrl' width='$ThumbnailWidth' height='$ThumbnailHeight' /></a><br />";
      }
    }
} catch (Zend_Gdata_App_Exception $e) {
  echo "Der Picasa Service von Google steht im Moment nicht zur Verfügung.<br />\n";
  $fh = fopen($google_picasa_log,"a+");
  fwrite($fh,$me . " > " . $e->getMessage());
  fclose($fh);
}  

?>
