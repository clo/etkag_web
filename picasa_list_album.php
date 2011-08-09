<?PHP

set_include_path("lib;".  get_include_path());
$me = basename($_SERVER['PHP_SELF']);

if ($me == "picasa_list_album.php"){
  include_once("cfg/config.inc.php");
}

/*
 * Load Zend framework for handling picasa web albums
 */
require_once 'Zend/Loader.php';
//Zend_Loader::laodClass('Zend_Gdata_Photos_UserQuery');
//Zend_Loader::laodClass('Zend_Gdata_Photos_PhotoQuery');
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

/* -----------------------------------------------------------------------------
 * no albumname is given, list all availalbe albums
 * -------------------------------------------------------------------------- */
$query = new Zend_Gdata_Photos_AlbumQuery();

try {
  $userFeed = $gp->getUserFeed(str_replace("@gmail.com","",$google_picasa_user));
  echo "<table>";
  foreach ($userFeed->getEntry() as $l){
    $title = $l->getTitle()->getText();
    //2011-05-09T09:38:34.766Z
    $datum = date("d.m.Y",mktime(0,0,0,
                                 substr($l->getUpdated(),5,2),
                                 substr($l->getUpdated(),8,2),
                                 substr($l->getUpdated(),0,4)));
    echo "<tr><td>$datum</td><td><a class='main' href='picasa_list_albumphotos.php?albumname=$title'>$title</a></td></tr>\n";
  }
  echo "</table>";
} catch (Zend_Gdata_App_Exception $e) {
  echo "Der Picasa Service von Google steht im Moment nicht zur Verfügung.<br />\n";
  $fh = fopen($google_picasa_log,"a+");
  fwrite($fh,$me . " > " . $e->getMessage());
  fclose($fh);
}

?>
