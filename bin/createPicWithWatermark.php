<?php 
error_reporting(E_ALL);
//set_time_limit(120);
ob_end_flush();
include_once("../lib/class.doc.php");
$preindex = "etkag_";
$srcdir = "../doc/anlass/22122005_Firmafest";
$desdir = "../doc/anlass/22122005_Firmafest";
//$srcdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/";
//$desdir = "C:/Dokumente und Einstellungen/Christian/Eigene Dateien/Eigene Bilder/Sambistas/output";

$picquality=75;
$watermarkfile = "logo_etk_100px.jpg";
$watermarkfile_width = 100;
$watermarkdir = "../img";
$WaterMark_Transparency = "50";  //Transparency, 100 for none, 0 for not visible
$strnumber = 10000;
$fontfile = "C:/Windows/Fonts/arial.ttf";
$picWidth = 1024;
$watermark = true;
$watermark_infotext = false;
$skipifexists = true;
$picextension = ".jpg|.JPG";
//$font = imageloadfont($fontfile);
$total = 0;
$myDoc = new doc($srcdir);
$myDoc->createDir($desdir);
$myDoc->debug = true;
$myDoc->newline = "<br>";
if (empty($dir_arr) || !isset($dir_arr)){
  $file_arr = array();
  $myDoc->getFiles_new($srcdir,$file_arr,$picextension,$preindex);
}
foreach ($file_arr as $dir => $file){
  $tmpsrcfile = $file;
  $tmpdesfile = dirname($file)."/".$preindex.basename($file); 
  if ($watermark_infotext){
    $exif_data = exif_read_data($tmpsrcfile,"IFD0") or print("ERROR getting exif data\n");
  }
  $start = time();
  $desFile = $tmpdesfile;
  echo $myDoc->newline."creating... ".$desFile." ...";
  if (!$skipifexists || !file_exists($desFile)){
    $start = time();
	// We want the watermark to be a gif (transparency without the white.) 
	if ($watermark){
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
	$end = time();
	echo ".. done";
	//exit();	
  }else{
	echo ".. exists";
  }
  $end = time();
  $diff = $end-$start;
  $total += $diff;
  echo " ($diff sec)\n";
  $strnumber++;
}
echo "Total time: $total sec\n";

?> 