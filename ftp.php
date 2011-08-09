<?PHP

// If the server where this file is located
// has the FTP portion of PHP enabled then
// you call just run this function locally.

// Dir is the directory to create

$dir = $HTTP_GET_VARS["dir"];
$file = $HTTP_GET_VARS["file"];

// These 3 variable you could pass to the
// script within the URL if you wanted -
// bit insecure though

$ftp_ip       = "ftp.rhone.ch";
$ftp_username = "$cfg_ftp_un";
$ftp_password = "$cfg_ftp_pw";

if($ftp=ftp_connect($ftp_ip))
{
    if(ftp_login($ftp,$ftp_username,$ftp_password))
    {

// Set to PASV mode

        ftp_pasv( $ftp, 1);

// In this example set the current directory to
// public_html

        ftp_chdir($ftp,"/htdocs/2011");

// If we cannot set our directory to the new one
// then we create it

        if(!ftp_chdir($ftp,$dir)){
            ftp_mkdir($ftp,$dir);
            echo("Directory $dir created ok");
            ftp_site($ftpstream,"CHMOD 0777 /htdocs/2011/$dir/$file");
            $fp = fopen('/htdocs/2011/$dir/$file', 'w');
            fputs($fp,'Learnt this at PHPSense.com');
            fclose($fp);
        }

    }
    ftp_close($ftp);
}


?>