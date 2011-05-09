<?PHP

set_include_path("lib;".  get_include_path());
$me = basename($_SERVER['PHP_SELF']);

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
echo "Include Path: " . get_include_path()."<br />\n";


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
$query->setUser(str_replace("@gmail.com","",$google_picasa_user));

try {
  $userFeed = $gp->getUserFeed($query);
  foreach ($userFeed->getEntry() as $l){
    $title = $l->getTitle()->getText();
    echo "<a class='main' href='picasa_list_albumphotos.php?albumname=$title'>$title</a><br />\n";
  }
} catch (Zend_Gdata_App_Exception $e) {
  echo "Der Picasa Service von Google steht im Moment nicht zur Verfügung.<br />\n";
  $fh = fopen($google_picasa_log,"a+");
  fwrite($fh,$me . " > " . $e->getMessage());
  fclose($fh);
}

?>
