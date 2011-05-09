<?PHP
class pictureresizer {

  var $doc;	
  var $new_width;
  var $new_height;
  var $width;
  var $height;
  
  function pictureresizer(&$doc){
  	$this->_check_gd();
  	$this->doc = $doc;
  }
  
  function getExifData($file){
    return exif_read_data($file,"IFD0");
  }
  
  function getImgJPEG($file){
  	$img = ImageCreateFromJPEG($file);
  	if (!$img){
	  $this->doc->debug("Could not create image: ".$file,true);
	}
	return $img;
  }
  
  function resizeImg(&$dstImg,&$srcImg){
    if (!is_resource($dstImg)){
      $this->doc->debug("Resource not valid: ".$dstImg);
    }
    if (!is_resource($srcImg)){
      $this->doc->debug("Resource not valid: ".$srcImg);
    }
    imagecopyresampled($dstImg,$srcImg, 0, 0, 0, 0, $this->new_width, $this->new_height, $this->width, $this->height);
  }
  
  function getImgSize($file){
  	return getimagesize($file);
  }
  
  function getNewImgSize($file,$picWidth){
  	list($this->width, $this->height) = $this->getImgSize($file);
  	$ratio = $this->width / $picWidth;
	$this->new_width = $picWidth;	
	$this->new_height = $this->height / $ratio;
    return array($this->new_width,$this->new_height);	    
  }
  
  function getNewImg($aSize){
    list($width,$height) = $aSize;
    return imagecreatetruecolor($width, $height);
  }
  
  function _check_gd(){
    //check if JPG support is available
    $aGD = gd_info();
    if($aGD['JPEG Support']!='1'){
      $this->doc->debug('JPG is not supported by GD.',true);
      exit;
    }
  }  
  
}
?>