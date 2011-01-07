<?

$file = $_GET[file];
if (isset($_GET['picWidth'])) { 
  $picWidth = $_GET['picWidth']; 
}else{
  $picWidth = 100;
}

list($width, $height) = getimagesize($file);
if ($width < $height){
  list($height,$width) = getimagesize($file);
}
$ratio = $width / $picWidth;
$new_width = $picWidth;	
$new_height = $height / $ratio;
$Main_Image = imagecreatetruecolor($new_width, $new_height);
$image_p = imagecreatefromjpeg($file);
imagecopyresampled($Main_Image,$image_p, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagejpeg($Main_Image) or print(".. failed\n'");		  
//header("Content-Type: image/jpg");
?>