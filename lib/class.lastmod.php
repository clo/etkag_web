<?PHP

class lastmod {
  var $date = 0;
  var $lastmod = 0;
  var $exclude_dir = "";
  var $format = "d.m.Y H:i:s";
  var $path = "";
  
 
  function getLastMod($format = null){
    if (is_null($format)){
      $format = $this->format;
    }
    return date($format,$this->lastmod);
  }

  function chkLastMod($path){   
    //echo $path."<br />";
    $suche = "";
    $dh = opendir($path);
    while(false !== ($file = readdir($dh))){
      //echo $file."<br />";
      //if (!preg_match("/$this->exclude_dir/", $file)) {
        if(($file != ".") && ($file != "..")){
          if(is_dir($path."/".$file)) {
            $this->chkLastMod($path."/".$file);
          } else {
            if(preg_match("/$suche/",$file)){ // for search
              //echo $file;
              $newdate = filemtime($path."/".$file);
              if ($newdate > $this->lastmod) {
                $this->lastmod = $newdate;
              }
            }
          }
        }
      //}
    }
    closedir($dh);
  }


}