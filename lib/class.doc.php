<?PHP
class doc {
  var $path = "";
  var $debug = false;
  var $newline = "\n";
  
  function doc($path=""){
    $this->path=$path;
  }
  
  function setDebug($debug=true){
    $this->debug = $debug;
  }
  
  function enableDebug(){
  	$this->setDebug(true);
  }

  function disableDebug(){
  	$this->setDebug(false);
  }
  
  function getDate($dir,$format='d.m.Y'){
  	preg_match('/^([0-9]{6})(.*)$/i',$dir,$target);
  	//echo substr($target[0],2,2)."".substr($target[0],0,2)."".substr($target[0],4,4);
    return date($format,mktime(0,0,0,substr($target[0],2,2),substr($target[0],0,2),substr($target[0],4,4)));
  }
  
  function getPictureSrc($file){
  	if (is_file($file)){
  	  return "&nbsp;<a class=main onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" href='$file' target='_new'><img src='img/lupe.jpg' border=0></a>";
  	}else{
  	  return null;
  	}
  }
  
  function getFileTypeSymbol($type){
    if (eregi("jpg",$type)) { $pic = 'img/jpg.png'; }
    if (eregi("pdf",$type)) { $pic = 'img/pdf.png'; }
    return "<img src='".$pic."' border=0>&nbsp;";
  }
  
  function getFileType($filename){
    preg_match('/\.(.*$)/',$filename,$result);
    return $result[1];
  }
  
  function getFolders($dir=null,$sort=true){
    if (empty($dir)){
    	$dir = $this->path;
    }
    if ($this->debug){
      echo "DEBUG: $dir".$this->newline;
    }
    if (is_dir($dir)){
      if ($dh = opendir($dir)) {
        $dir_arr = array();
        $i = 0;
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != ".."){
          	$index = '';
            $index = $this->getInfoText($dir."/".$file,'datum');
            if (empty($index)){
              $index = '10000101';
            }else{
              $index = substr($index,6,4).substr($index,3,2).substr($index,0,2);
            }
            $dir_arr[$index.'_'.$i] = $file;
            if ($this->debug){
              echo "DEBUG: $dir/$file".$this->newline."<br>";
            }
            $i++;
          }
        }
        closedir($dh);
      }
    }else{
      echo "Verzeichnis $dir existiert nicht.";
      exit();
    }
    if ($sort){	
      krsort($dir_arr);
    }
    return $dir_arr;
  }
  
  function getFoldersWithDate($dir=null,$sort=true){
    if (empty($dir)){
    	$dir = $this->path;
    }
    if ($this->debug){
      echo "DEBUG: $dir".$this->newline;
    }
    if (is_dir($dir)){
      if ($dh = opendir($dir)) {
        $dir_arr = array();
        while (($file = readdir($dh)) !== false) {
          if ($file != "." && $file != ".."){
            $index = substr($file,4,4).substr($file,2,2).substr($file,0,2);
            $dir_arr[$index] = $file;
            if ($this->debug){
              echo "DEBUG: $dir/$file".$this->newline."<br>";
            }
          }
        }
        closedir($dh);
      }
    }
    if ($sort){	
      krsort($dir_arr);
    }
    return $dir_arr;
  }
  
function getFiles_new($dir=null,&$file_arr,$include=".*",$exclude=".*"){
  if (empty($dir)){
	$dir = $this->path;
  }
  $this->debug($dir);
  if (is_dir($dir)){
    if ($dh = opendir($dir)) {
      while (($file = readdir($dh)) !== false) {
        if ($file != ".." && $file != "."){
          if(is_file($dir."/".$file) && preg_match("/$include/",$file) && !eregi("/$exclude/",$file)){
            if ($this->debug) echo "FILE: ".$dir."/".$file.$this->newline;
            $file_arr[] = $dir."/".$file;
          }else{
            $this->getFiles_new($dir."/".$file,$file_arr,$include,$exclude);
          }
        }
      }
      closedir($dh);
    }
  }	 
}  

function getFiles_new2($dir,&$file_arr,$include=null,$exclude=null,$i=0){
  //$this->debug($dir);
  if ($i==0){
    $this->debug("Looking for pictures (D=$dir, I=$include, E=$exclude) ...",false);	
  }
  if (is_dir($dir)){
    if ($dh = opendir($dir)) {
      while (($file = readdir($dh)) !== false) {
        if ($file != ".." && $file != "."){
          $this->getFiles_new2($dir."/".$file,$file_arr,$include,$exclude,++$i);
          $i--;
        }
      }
      closedir($dh);
    }
  }elseif(is_file($dir)){
    if (!is_null($include) && is_null($exclude)){
      if(is_file($dir) && preg_match($include,$dir)){
        $file_arr[] = $dir;
      }
    }elseif (is_null($include) && !is_null($exclude)){
      if(is_file($dir) && !preg_match($exclude,$dir)){
        $file_arr[] = $dir;
      }
    }elseif (!is_null($include) && !is_null($include)){
      if(is_file($dir) && preg_match($include,$dir) && !preg_match($exclude,$dir)){
        $file_arr[] = $dir;
      }
    }elseif (is_null($include) && is_null($include)){
      if(is_file($dir)){
        $file_arr[] = $dir;
      }
    }
  }
  if ($i==0){
    count($file_arr) > 1 ? $picture = "pictures" : $picture = "picture";
    $this->debug(".. done [ ".count($file_arr)." ".$picture." ]");
  }
}  

function listdir($start_dir='.') {
  $files = array();
  if (is_dir($start_dir)) {
    $fh = opendir($start_dir);
    while (($file = readdir($fh)) !== false) {
      # loop through the files, skipping . and .., and recursing if necessary
      if (strcmp($file, '.')==0 || strcmp($file, '..')==0) continue;
      $filepath = $start_dir . '/' . $file;
      if ( is_dir($filepath) )
        $files = array_merge($files, $this->listdir($filepath));
      else
        array_push($files, $filepath);
    }
    closedir($fh);
  } else {
    # false if the function was called with an invalid non-directory argument
    $files = false;
  }
}

function getFiles($dir=null,$include=".*"){
    if (empty($dir)){
    	$dir = $this->path;
    }
    if ($this->debug){
      print "DEBUG: ".$dir;
    }
    $file_arr=array();          
    if (is_dir($dir)){
      if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
		  if ($file != ".." && $file != "." && $file != "info.txt"){
            if (preg_match("/$include/i",$file)){
              if ($this->debug){
                print $file.$this->newline;
              }
              $file_arr[] = $file;
            }
          }
        }
        closedir($dh);
      }
    }	 
    return $file_arr;
  }
  
  function getInfoText($dir=null,$col='',$action='SINGLE'){
  	if (empty($dir)){
  	  $dir = $this->path;
  	}
    if ($action=='SINGLE'){
      if (is_file($dir."/info.txt")){
        $fh = fopen($dir."/info.txt","r");
        $content = fread($fh, filesize($dir."/info.txt"));
        $file_arr = split("\n",$content);
        foreach($file_arr as $key => $val){
      	  //list($k,$v) = split("=",$val);
      	  if (!preg_match("/^#/",$val)){
      	    list($k,$v) = $this->split_single("=",$val);
      	    $info_arr[$k] = $v;
      	  }
        }
        fclose($fh);
        if (empty($col)){
          return $info_arr;
        }else{
       	  return $info_arr[$col];
        }
      }else{
        return null;
      }
    }elseif($action='MULTIPLE'){
      if (is_file($dir."/info.txt")){
        $fh = fopen($dir."/info.txt","r");
        $content = fread($fh, filesize($dir."/info.txt"));
        $file_arr = split("\n",$content);
        $i = 0;
        foreach($file_arr as $key => $val){
      	  $val = rtrim($val);
      	  //list($k,$v) = split("=",$val);
      	  if (!preg_match("/^#/",$val)){
      	    list($k,$v) = $this->split_single("=",$val);
      	    $info_arr[$i][$k] = $v;
      	    if ($val == ''){
      	      $i++;
      	    }
      	  }
        }
        fclose($fh);
        if (empty($col)){
          return $info_arr;
        }else{
       	  return $info_arr[$col];
        }
      }else{
        return null;
      }
    }
  }
  
  function getDetailInformation($file,$match){
  	$matched=false;
  	$retVal = array();
  	$fh = fopen($file.'/info.txt',"r");
  	while(!feof($fh)){
      $line = trim(fgets($fh));
  	  if (preg_match("/$match/",$line)){
       	$matched=true;
  	  }
  	  if ($line==''){
      	$matched=false;
      }
  	  if($matched){
  	    list($k,$v) = $this->split_single("=",$line);
  	  	//if (preg_match("/detail_/",$k)){
  	  	  $retVal[$k] = $v;
  	  	//}
  	  }
  	}
  	fclose($fh);
  	return $retVal;
  }
  
  function split_single($needle,$val){
  	$pos = strpos($val,$needle);
  	$v = substr($val,0,$pos);
  	$w = substr($val,$pos+1);
  	return array($v,$w);
  	//todo:$v = strpo
  }
  
  function getFileContent($file){
  	if (is_file($file)){
      $fh = fopen($file,"r");
      $content = fread($fh, filesize($file));
      $content = str_replace("\n","<br>",$content);
      fclose($fh);
      return $content;
    }else{
      return null;
    }
  }
    
  function docAvailable($dir=null,$include=""){
  	if (empty($dir)){
  	  $dir = $this->path;
  	}
  	$available = false;
  	if (is_dir($dir)){
  	  if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
          if ($file != ".." && $file != "."){
            if (!empty($include)){
              if (eregi($include,$file)){
                return true;
              }else{
                return false;
              }
            }else{
              $available = true;
              return $available;
            }
          }
        }
        closedir($dh);
      }else{
        echo "ERROR: docAvailable - Verzeichnis nicht vorhanden.".$this->newline;
  	  }
  	}
    return $available;
  }
  
  function sortArr($arr){
  	$retArr = array();
  	if (!empty($arr)){
  	  foreach ($arr as $val){
  	  	$retArr[substr($val,4,4).substr($val,2,2).substr($val,0,2)] = $val; 
  	  }
  	}
  	krsort($retArr);
  	return $retArr;
  }
  
  function formatLinkName($link,
                          $remLeadingNumber=false,
                          $umlaut=true,
                          $remLeadingString="",
                          $dir="",
                          $info=false,
                          $remPost=false){
  	$link_original = $link;
  	
  	if ($remLeadingNumber){
  	  preg_match('/^[0-9]*(.*)$/',$link,$target);
  	  $link = $target[1];
  	}

  	if (!empty($remLeadingString)){
  	  $link = str_replace($remLeadingString,"",$link);   
  	}

  	$link = str_replace("_"," ",$link);
  	
  	if ($umlaut){
  	  $link = $this->insertUmlaut($link);
  	  //$link = str_replace("ae","�",$link);
  	  //$link = str_replace("ue","�",$link);
  	  //$link = str_replace("e�","eue",$link);
  	  //$link = str_replace("oe","�",$link);
  	}
  	

  	
  	if ($info){
  	  echo $dir;
  	  $fulllink = $dir."/".$link_original;
  	  
  	  $link = substr($link,0,strlen($link)-strlen(filetype($fulllink)));
  	  $link .= "(".filesize($fulllink).")";
  	}
  
  	if ($remPost){
  		//print filetype($link);
  		//$link = substr($link,0,strlen($link)-strlen(filetype($link)));
  		preg_match("/.*\.(.*)/",$link,$target);
  		$filetype = $target[1];
  		$link = substr($link,0,strlen($link)-strlen($filetype)-1);
  	}
  	return $link;
  }
  
  function insertUmlaut($link){
    $link = str_replace("ae","�",$link);
    $link = str_replace("h�","hae",$link);
  	$link = str_replace("ue","�",$link);
  	$link = str_replace("e�","eue",$link);
  	$link = str_replace("oe","�",$link);
  	return $link;
  }
  
  function replaceUmlaut($link){
    $link = str_replace("�","ae",$link);
  	$link = str_replace("�","ue",$link);
  	$link = str_replace("e�","eue",$link);
  	$link = str_replace("�","oe",$link);
  	$link = str_replace(" ","_",$link);
  	return $link;
  }
  
  function createDir($dir){
    if (!is_dir($dir)){
      if (!mkdir($dir)) {
      	$this->debug('Directory creation failed: '.$dir);
      	exit;
      }
    }
  }
  
  function createDirRecursive($dir){
    if(is_string($dir)){
      $arr = split('\/',$dir);
      $this->createDirRecursive($arr);
    }
    if (is_array($dir)){
      $dt = '';
      foreach ($dir as $d){
        $dt .= $d;
		$this->createDir($dt);
        $dt .= '/';
      }
    }
  }
  
  function getDirAndFileName($dir){
  	$d = "";
  	$f = "";
  	$f = basename($dir);
  	$d = dirname($dir);
  	return array($d,$f); 
  }
  
  function deleteFile($file){
    $this->debug('deleting local ... '.$file.' ..',false);
    if (is_file($file)){
      if (unlink($file)){
        $this->debug('... done');
      }else{
      	$this->debug('... failed');
      }
    }else{
      $this->debug('... skipped [ file does not exist ]');
    }
  }
  
  function replaceUserCharWithHtmlChar(&$msg){
  	$msg = str_replace("_dick_","<b>",$msg);
  }
  
  function debug($msg,$newline=true){
  	if ($this->debug){ 
  	  echo $msg;
  	  $newline ? $nl = $this->newline : $nl = "";
  	  echo $nl;
  	}
  }
  
  function dump($val){
    echo "<pre>";
    print_r($val);
    echo "</pre>";
  }
  
}
?>