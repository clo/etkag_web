<?PHP
/***************************************************************************
 *  Some basic script function;
 ***************************************************************************/
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL);
ini_set("memory_limit","200M");
set_time_limit(0);
ob_end_flush();

/***************************************************************************
 * LIBRARIES
 ***************************************************************************/
include("../cfg/config.inc.php");
include("../lib/class.doc.php");
include("../lib/class.ftp.php");
include("../lib/class.timer.php");
include("../lib/class.wget.php");
include("../lib/class.pictureresizer.php");
include("../lib/lib.inc.php");


/***************************************************************************
 * CONFIGURATION
 ***************************************************************************/
$user = $cfg_ftp_un;
$pass = $cfg_ftp_pw;
$ftpsrc = 'ftp://ftp.rhone.ch/htdocs/doc';
$pendingfilestodownload = "./files_download_failed.log";
$preindex = "etkag_";
$srcdir = "Z:/LOC/kjoff/etkag2/bin/ftp.rhone.ch";
$src = "C:/data/Z0/sandbox/etkag2/bin/ftp.rhone.ch";
//$srcdir = "htdocs/doc/";
$desdir = "Z:/temp/wget/www.etkag.ch/doc";
$except_dir = "logos|organigramm|Thumbs.db";
$include = "/.jpg|.JPG/i";
$exclude = "/etkag_|organigramm/";
//$srcdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/";
//$desdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/output";
$removeOriginalServerFile = true;
$removeOriginalLocalFile = true;
$localtmpfile = 'pic.tmp';
$picquality=75;
$watermarkfile = "logo_etk_100px.jpg";
$watermarkfile_width = 100;
$watermarkdir = ".";
$WaterMark_Transparency = "50";  //Transparency, 100 for none, 0 for not visible
$strnumber = 10000;
$fontfile = "C:/Windows/Fonts/arial.ttf";
$picWidth = 1024;
$watermark = true;
$watermark_infotext = false;
$skipifexists = true;
$skipiforiginalfileexists = true;
$picextension = "JPG";
//$font = imageloadfont($fontfile);
$total = 0;

logit("--------------------------------------------------------");
/***************************************************************************
 * INSTANCES
 ***************************************************************************/
$timer = new timer();

$myDoc = new doc($srcdir);
$myDoc->debug = true;
$myDoc->newline = "\n";
$myDoc->createDirRecursive($desdir);

$wget = new wget($user, $pass, $ftpsrc, $myDoc, false);

$myftp = new ftp($user,$pass);
$myftp->spider = false;
//$myftp->connect();
$myftp->debug = true;

$pic = new pictureresizer($myDoc);


/***************************************************************************
 * GET REMOTE FILES
 ***************************************************************************/
logit("<<<DOWNLOADING<<< Getting files from server ...",false);
$wget->run();
logit(".. done");

/***************************************************************************
 * GET PICTURES FROM LOCAL DIRECTORY
 ***************************************************************************/
if (empty($dir_arr) || !isset($dir_arr)){
  $file_arr = array();
  $myDoc->getFiles_new2($srcdir,$file_arr,$include,$exclude);
}

/***************************************************************************
 * RESIZE PICTURES
 ***************************************************************************/
if (true){
  $myDoc->debug("Resizing pictures ... ");
  logit("INFO: Resizing pictures ... ",true);
  $i = 1;
  foreach ($file_arr as $dir => $file){
    $tempfile = str_replace($srcdir."/","",$file);
    $myDoc->debug(sprintf("%-10s",$i."/".count($file_arr)),false);
    $myDoc->debug(sprintf("%-100s %s","Resizing... ".$tempfile," ..."),false);
    logit(sprintf("%-100s %s","Resizing... ".$tempfile," ..."),false);

    $tResize = new timer();
    $err = '';
    if (!file_exists($file)){
      $err = "ERROR: File does not exist.";
	  $myDoc->debug("[ ".$err." ]",true);
    }
    if (filesize($file) == 0){
	  $err = "ERROR: Filesize is 0.";
	  $myDoc->debug("[ ".$err." ]",true);
    }
    if (!empty($err)){
      echo "... failed [ $err ]\n";
      logit($err);
      continue;
    }
    $failed=1;
    $tmpdesfile = dirname($file).'/'.$preindex.basename($file);

    if ($watermark_infotext){
      $exif_data = $pic->getExifData($file);
    }

    $start = time();
    $desFile = $tmpdesfile;
    if (!$skipifexists || !file_exists($desFile)){
      $start = time();
	  // We want the watermark to be a gif (transparency without the white.)
	  if ($watermark){
	    if (!is_file($watermarkdir."/".$watermarkfile)){
	  	  $myDoc->debug("Watermarkfile $watermarkdir."/".$watermarkfile is not available.",false);
	      exit();
	    }

	    $WaterMarkImg = $pic->getImgJPEG($watermarkdir."/".$watermarkfile);
	    $newImg = $pic->getNewImg($pic->getNewImgSize($file,$picWidth));
	    $image_p = $pic->getImgJPEG($file);

	    $pic->resizeImg($newImg,$image_p);
	    $Main_Image_width = $new_width;   //imageSX($Main_Image);
	    $Main_Image_height = $new_height; //imageSY($Main_Image);
	    if ($watermark){
		  $WaterMark_width = imageSX($WaterMarkImg);
		  $WaterMark_height = imageSY($WaterMarkImg);
	    }
	    $WaterMark_x = ($Main_Image_width - $WaterMark_width);
	    $WaterMark_y = ($Main_Image_height - $WaterMark_height);
	    imageCopyMerge($newImg, $WaterMarkImg, $WaterMark_x-10, $WaterMark_y-10, 0, 0, $WaterMark_width, $WaterMark_height, $WaterMark_Transparency);
	    //$pic->getImgCopyMerge();
	    if ($watermark_infotext){
		  $black = imagecolorallocate($newImg, 0, 0, 0);
		  imagettftext($newImg, 10, 0, $WaterMark_x-50, $Main_Image_height-20, 0,$fontfile, $key." (".$val[0].$strnumber.".jpg)", $black);
	    }
	  }
	  $desfh = imagejpeg($newImg,$desFile,$picquality) or exit(".. failed");
	  $myDoc->debug(".. done [ ".$tResize->stop()." sec ]",true);
	  logit(".. done [ ".$tResize->stop()." sec ]",true);
    }else{
	  $myDoc->debug(".. exists [ ".$tResize->stop()." sec ]",true);
      logit(".. exits [ ".$tResize->stop()." sec ]",true);
    }
    $strnumber++;
    $i++;
  }
}

//upload files
/***************************************************************************
 * GET PICTURES FROM LOCAL DIRECTORY FOR UPLOAD
 ***************************************************************************/
$myDoc->debug("Uploading files to server ...");
logit("Uploading files ...");
$file_arr = array();
$myDoc->getFiles_new2($srcdir,$file_arr,"/etkag_.*.jpg/i","/organigramm/");
$myftp->connect();
foreach($file_arr as $dir => $file){
  $lfile = dirname($file).'/'.basename($file);
  $rfile = str_replace($srcdir.'/','',dirname($file)).'/'.$myDoc->replaceUmlaut(basename($file));
  logit(">>>UPLOAD>>>  $rfile ...",false);
  if ($myftp->uploadFile_new($rfile,$lfile)){
    logit(" .. done");
  }else{
    logit(" .. failed");
  }
}
$myftp->disconnect();

/***************************************************************************
 * REMOVE RESIZED FILES FROM LOCAL DIRECTORY
 ***************************************************************************/
if ($removeOriginalServerFile){
  $myDoc->debug("Deleting original files on server ...");
  logit("Deleting files on local machine ...");
  $myftp->connect();
  $file_arr = array();
  $myDoc->getFiles_new2($srcdir,$file_arr,"/.jpg/i","/etkag_.*.jpg/i");
  foreach($file_arr as $dir => $file){
    $rfile = str_replace($srcdir.'/','',$file);
    logit(sprintf("%s %-100s",">>>DELETE>>>","$rfile ..."),false);
	if($myftp->deleteFile($rfile)){
	  logit(" .. done");
	}else{
	  logit(" .. failed");
	}
  }
}
/***************************************************************************
 * REMOVE ORGINAL FILES FROM LOCAL DIRECTORY
 ***************************************************************************/
if ($removeOriginalLocalFile){
  $myDoc->debug("Deleting files on local machine ...");
  logit("Deleting files on local machine ...");
  $myftp->connect();
  $file_arr = array();
  $myDoc->getFiles_new2($srcdir,$file_arr,"/.jpg/i","/etkag_.*.jpg/i");
  foreach($file_arr as $dir => $file){
    $rfile = str_replace($srcdir.'/','',$file);
    logit(sprintf("%s %-100s",">>>DELETE>>>","$rfile ..."),false);
	if($myDoc->deleteFile($file)){
	  logit(" .. done");
	}else{
	  logit(" .. failed");
	}
  }
}
$myftp->disconnect();

$myDoc->debug("\nTotal time: ".$timer->stop()." sec");
//$myftp->disconnect();
logit("--------------------------------------------------------");

?>