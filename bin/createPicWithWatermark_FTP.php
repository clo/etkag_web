<?php 
error_reporting(E_ALL);
set_time_limit(0);
ob_end_flush();
include_once("../lib/class.doc.php");
include_once("../lib/class.ftp.php");
$preindex = "etkag_";
//$srcdir = "htdocs/doc/anlass/";
$srcdir = "htdocs/doc";
$desdir = "../doc/referenzen";
$except_dir = ".*logos.*";
//$srcdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/";
//$desdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/output";
$myftp = new ftp();
$myftp->connect();
//$file_arr = $myftp->getFiles($srcdir,"etkag_");
//print_r($file_arr);
//exit();
$removeOriginalServerFile = true;
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
$skipifexists = false;
$picextension = "JPG";
//$font = imageloadfont($fontfile);
$total = 0;
$myDoc = new doc($srcdir);
$myDoc->createDir($desdir);
$myDoc->debug = true;
$myDoc->newline = "\n";
if (empty($dir_arr) || !isset($dir_arr)){
  $file_arr = array();
  //$myDoc->getFiles_new($srcdir,$file_arr,$picextension,$preindex);
  $myftp->debug("looking for pictures...");	
  $myftp->getFiles($srcdir,$preindex."*",$file_arr,$picextension,$except_dir);
  print_r($file_arr);
}
$i = 1;
foreach ($file_arr as $dir => $file){
  $myDoc->debug($i."/".count($file_arr),true);
  //download file
  //if (!file_exists(basename($file))){
  //if (!file_exists($file)){
  	MakeDirectory(dirname($file));
  	$myftp->downloadFile($file,$file); 
  //}
  $failed=1;
  $tmpdesfile = dirname($file).'/'.$preindex.basename($file); 

  if ($watermark_infotext){
    $exif_data = exif_read_data($file,"IFD0") or print("ERROR getting exif data\n");
  }

  $start = time();
  $desFile = $tmpdesfile;
  echo "creating... ".$desFile." ...";
  if (!$skipifexists || !file_exists($desFile)){
    $start = time();
	// We want the watermark to be a gif (transparency without the white.) 
	if ($watermark){
	  //echo $watermarkdir."/".$watermarkfile."\n";
	  $WaterMark = imagecreatefromjpeg($watermarkdir."/".$watermarkfile);
	  list($width, $height) = getimagesize($file);
	  $ratio = $width / $picWidth;
	  $new_width = $picWidth;	
	  $new_height = $height / $ratio;
	  $Main_Image = imagecreatetruecolor($new_width, $new_height);
	  $image_p = imagecreatefromjpeg($file);
	  imagecopyresampled($Main_Image,$image_p, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	  //Get the width and height of each image.     
	  //$ratio = imageSX($Main_Image) / $picWidth;
	  $Main_Image_width = $new_width; //imageSX($Main_Image); 
	  $Main_Image_height = $new_height; //imageSY($Main_Image); 
	  if ($watermark){
		$WaterMark_width = imageSX($WaterMark); 
		$WaterMark_height = imageSY($WaterMark); 
	  }
	  // This will be the position of the WaterMark 
	  //if ($watermark){
	  $MaterMark_x = ($Main_Image_width - $WaterMark_width); 
	  $MaterMark_y = ($Main_Image_height - $WaterMark_height); 
	  //}    
	  // We want to put the watermark on top of the main image. 
	  //if ($watermark){
		imageCopyMerge($Main_Image, $WaterMark, $MaterMark_x-10, $MaterMark_y-10, 0, 0, $WaterMark_width, $WaterMark_height, $WaterMark_Transparency); 
	  //}
	  // Let the browser know that it is an image.. 
	  // header("Content-Type: image/PNG"); 
	  if ($watermark_infotext){
		$black = imagecolorallocate($Main_Image, 0, 0, 0);
		imagettftext($Main_Image, 10, 0, $MaterMark_x-50, $Main_Image_height-20, 0,$fontfile, $key." (".$val[0].$strnumber.".jpg)", $black);
	  }
	}
	$desfh = imagejpeg($Main_Image,$desFile,$picquality) or exit(".. failed");
	echo ".. done\n";
    //echo dirname($desFile)."/".$file." ".basename($desFile);
    
    $myftp->uploadFile(dirname($file)."/".$myDoc->replaceUmlaut(basename($desFile)),$desFile);
	
	if ($removeOriginalServerFile){
	  $myftp->deleteFile($file);
	  //exit();
	}
	//exit();
	$end = time();
	
	//exit();	
  }else{
	echo ".. exists";
  }
  $end = time();
  $diff = $end-$start;
  $total += $diff;
  echo " ($diff sec)\n";
  $strnumber++;
  $i++;
  //}
}
echo "Total time: $total sec\n";
$myftp->disconnect();

function MakeDirectory($dir, $mode = 0755){
  if (is_dir($dir) || @mkdir($dir,$mode)) return TRUE;
  if (!MakeDirectory(dirname($dir),$mode)) return FALSE;
  return @mkdir($dir,$mode);
}

?> 