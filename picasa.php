<?PHP
session_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include("header.php");
set_include_path("lib;".  get_include_path());
error_reporting(E_ALL);
$me = $_PHP['self'];

require_once 'Zend/Loader.php';
//Zend_Loader::laodClass('Zend_Gdata_Photos_UserQuery');
//Zend_Loader::laodClass('Zend_Gdata_Photos_PhotoQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_UserQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos_AlbumQuery');
Zend_Loader::loadClass('Zend_Gdata_Photos');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_AuthSub');
echo "Include Path: " . get_include_path()."<br />\n";
echo "PICASA Test<br />\n";

// Konfigurationsparameter setzen
//$config = array(
//    'adapter'    => 'Zend_Http_Client_Adapter_Proxy',
//    'proxy_host' => 'proxy.swisscom.com',
//    'proxy_port' => 8080,
//    'proxy_user' => '',
//    'proxy_pass' => ''
//);
//
//// Client-Objekt instanziieren
//$clientproxy = new Zend_Http_Client('http://www.example.com', $config);
//
//// $client kann jetzt wie gewohnt benutzt werden

$serviceName = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
$user = $google_picasa_user;
$pass = $google_picasa_pass;

$client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $serviceName);

// update the second argument to be CompanyName-ProductName-Version
$gp = new Zend_Gdata_Photos($client);
//try {
//  $userFeed = $gp->getUserFeed("christian.lochmatter");
//  foreach ($userFeed as $userEntry) {
//    echo $userEntry->title->text . "<br />\n";
//  }
//} catch (Zend_Gdata_App_HttpException $e) {
//  echo "Error: " . $e->getMessage() . "<br />\n";
//  if ($e->getResponse() != null) {
//      echo "Body: <br />\n" . $e->getResponse()->getBody() .
//           "<br />\n";
//  }
//  // In new versions of Zend Framework, you also have the option
//  // to print out the request that was made.  As the request
//  // includes Auth credentials, it's not advised to print out
//  // this data unless doing debugging
//  // echo "Request: <br />\n" . $e->getRequest() . "<br />\n";
//} catch (Zend_Gdata_App_Exception $e) {
//    echo "<pre>";
//    echo "Error: " . $e->getMessage() . "<br />\n";
//    echo "</pre>";
//}

echo "<pre>";
//$query = $gp->newAlbumQuery();
//$query->setUser("default");
//$query->setAlbumName("Ablagebox");
//
//print_r($query);
//
//try{
//  $albumFeed = $gp->getAlbumFeed($query);
//} catch(Zend_Uri_Exception $e){
//  echo "<pre>";
//  echo "Error: " . $e->getMessage() . "<br />\n";
//  echo "</pre>";
//}
//foreach ($albumFeed as $albumEntry) {
//    echo $albumEntry->title->text . "<br />\n";
//}
print_r($_SESSION);
if (isset($_GET['albumname'])){
    $_SESSION['albumname']=$_GET['albumname'];
}
if (!isset($_SESSION['albumname'])) {
    $query = new Zend_Gdata_Photos_UserQuery();
    $query->setUser("christian.lochmatter");
    $query->setType("entry");

    try {
        //$albumFeed = $gp->getAlbumFeed($query);
        $userFeed = $gp->getUserFeed("default");
        $link = $userFeed->getEntry();
        foreach ($userFeed->getEntry() as $l){
          $title = $l->getTitle()->getText();
          echo "<a class='main' href='$me?albumname=$title'>$title</a><br />";
          //print_r($l->getLink());
        }
    //echo "Album: " . $albumFeed->getEntry();
        //print_r($link);
        //print_r($userFeed);
    } catch (Zend_Gdata_App_Exception $e) {
        echo "Error: " . $e->getMessage();
        echo "Trace: " . $e->getTrace();
    }
} elseif(isset($_SESSION['albumname'])) {
    echo $_SESSION['albumname'];
    $query = new Zend_Gdata_Photos_AlbumQuery();
    $query->setUser("christian.lochmatter");
    $query->setType("entry");
    $query->setAlbumName($_SESSION['albumname']);
    try {
        //$albumFeed = $gp->getAlbumFeed($query);
        $userFeed = $gp->getUserFeed($query);
        $link = $userFeed->getEntry();
        foreach ($userFeed->getEntry() as $l){
          $title = $l->getTitle()->getText();
          echo "<a class='main' href='$me?albumname=$title'>$title</a><br />";
          //print_r($l->getLink());
        }
    //echo "Album: " . $albumFeed->getEntry();
        //print_r($link);
        //print_r($userFeed);
    } catch (Zend_Gdata_App_Exception $e) {
        echo "Error: " . $e->getMessage();
        echo "Trace: " . $e->getTrace();
    }
}


include("footer.php");
?>
