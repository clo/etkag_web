<?PHP
error_reporting(E_ALL);
require_once 'Net/FTP.php';

/**
 * Setting up test variables. The following variables have to be set
 * up, to suite the needs of your environment.
 */

//$host = 'localhost';
//$user = 'tgdloch3';
//$pass = 'k74tmere';
$port = 21;
$host = "etkag.ch";
$user = "kalbjean";
$pass = "jvd88p6c";

$remote_dir = "htdocs/doc/";
$local_dir = "htdocs_new/doc/";

$ftp = new Net_FTP($host,$port);

$ftp->connect();
$ftp->login($user, $pass);

$ret = $ftp->getRecursive($remote_dir,$local_dir);
echo $ret;


$ftp->disconnect();
?>