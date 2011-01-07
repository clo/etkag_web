<?

class lastmod {
  var $date = 0;
  var $lastmod = 0;
  var $exclude_dir = "doc";
  var $format = "d.m.Y H:i:s";
  var $path = "";
  
 
//echodir("./");
//$lastmod = "Letzte &Auml;nderung: ".date("d.m.Y H:i:s",$date)."\n";

  function getLastMod($format = null){
    if (is_null($format)){
      $format = $this->format;
    }
    return date($format,$this->lastmod);
  }

  function chkLastMod($path){   
    $suche = "";
    $dir = @dir($path);
    if (! $dir) {return;}

    while(false !== ($file = $dir->read())){
      if (!eregi($this->exclude_dir, $file)) {
        if(($file != ".") && ($file != "..")){
          if(is_dir($path."/".$file)) {
            getLastMod($this->path."/".$file);
          } else {
            if(preg_match("/$suche/",$file)){ // für suche
              $newdate = filemtime($path."/".$file);
              if ($newdate > $date) {
                $date = $newdate;
              }
            }
          }
        }
      }
    }
    $dir->close();
    $this->lastmod = $date;
  }


}