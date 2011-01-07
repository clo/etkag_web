<?
class ftp {
  var $debug = true;
  var $host = "etkag.ch";
  private $un = "kalbjean";
  private $pw = "jvd88p6c";
  var $port = 21;
//  var $host = "127.0.0.1";
//  var $un = "tgdloch3";
//  var $pw = "k74tmere";
  var $conid;
  var $dir;
  var $session;
  var $logfile = "log/createPicWithWatermark.log";
  public $spider = true;
  private $_sleep = 10000;
  
  function __construct($user=null,$pass=null){
  	$this->_setUser($user);
  	$this->_setPassword($pass);
  }
  
  function connect($host=null,$un=null,$pw=null) {
	$this->debug("Connecting to $this->host ...",false);
	if (!$this->spider){
	  if (isset($host)) { $this->host = $host; }
	  if (isset($un))   { $this->un = $un; }
	  if (isset($pw))   { $this->pw = $pw; }
	  $this->conid = ftp_connect($this->host,$this->port);
	  if (!$this->conid){
		$this->debug("Could not connect to ftp server: $this->host.");
		$this->debug("There is probably a network problem.");
		exit;
	  }
	  $this->session = ftp_login($this->conid,$this->un,$this->pw);
	  if ($this->session) {
	    $this->debug(".. done");
	    if (ftp_pasv($this->conid,true)) {
	      $this->debug("Changed to passiv mode.",true);
	    }else{
	      $this->debug("Could not change to passiv mode.",true);
	    }
	    return true;
	  }else{
	    return "ERROR: Could not connect to: ".$this->host;
	    exit;
	  }
	}else{
      $this->debug(".. done [ SPIDER ]");
	  return true;
	}
  }
  
  function getFiles($dir,$exclude=null,&$retval, $include, $except=null){
    $this->debug($dir);
    $this->debug('.',false);
    $val = ftp_nlist($this->conid,$dir);
    //$retval = array();
    foreach ( $val as $key => $file){
      $this->debug($dir. "/".$file);
      if(is_array($file) || $file == '.' || $file == '..'){
      	echo "CONTINUE: $file\n";
      	continue;
      }
      if (!is_null($exclude)){
        if (!eregi($exclude,$file)){
    	  if (is_file($dir."/".$file)){
    	  //if(eregi($include,$file)){
    	    if (!is_null($except)){
    	      //echo "Exception: ".$except."\n";
    	      if (!preg_match("/$except/",$dir)){
    	        //$this->debug($dir."/".$file);
    	        //$this->debug('.',false);
    	        $retval[] = $dir."/".$file;
    	      }else{
    	        $this->debug("EXCEPTION: ".$dir."/".$file);
    	      }
    	    }else{
    	       //$this->debug($dir."/".$file);
    	       $this->debug('.',false);
    	       if (!preg_match("/$except/",$dir)){
    	         $retval[] = $dir."/".$file;
    	       }else{
    	        $this->debug("EXCEPTION: ".$dir."/".$file);
    	      }
    	    }
    	  }else{
    	    echo "RECURSIVE: $dir/$file\n";
    	    $this->getFiles($dir."/".$file,$exclude,$retval,$include, $except);
    	  }
        }
      }
    }
  }
  
  function getFiles_New($dir,&$retval){
    $this->debug($dir,true);
    $val = ftp_nlist($this->conid,$dir);
    print_r($val);
    foreach ($val as $key => $file){
      if($file != '.' && $file != '..'){
        if (is_file($dir."/".$file)){
          $retval[] = $dir."/".$file;
  	    }else{
   	      $this->debug("RECURSIVE: $dir/$file",true);
   	      $this->getFiles_New($dir."/".$file,$retval);
   	    }
      }
    }
  }
  
  function list_all_files($path,&$flist){
    echo $path."\n";
    $buff = ftp_rawlist($this->conid,$path);
    $res = $this->parse_rawlist($buff) ;
    //static $flist = array();
    if(count($res)>0){
        foreach($res as $result){
            // verify if is dir , if not add to the  list of files
            if($result['size']== 0){
                // recursively call the function if this file is a folder
                $this->list_all_files($path.'/'.$result['name'],$flist);
            }
            else{
            // this is a file, add to final list
                $flist[] = $result;
            }     
        }
    }
    return $flist;
  }
  
  function parse_rawlist( $array ) {
    for ( $i = 1; $i < count($array); $i++ ) {
       $current = $array[$i];
       $structure[$i]['perms']  = substr($current, 0, 10);
       $structure[$i]['number'] = trim(substr($current, 11, 3));
       $structure[$i]['owner']  = trim(substr($current, 15, 8));
       $structure[$i]['group']  = trim(substr($current, 24, 8));
       $structure[$i]['size']  = trim(substr($current, 33, 8));
       $structure[$i]['month']  = trim(substr($current, 42, 3));
       $structure[$i]['day']    = trim(substr($current, 46, 2));
       $structure[$i]['time']  = substr($current, 49, 5);
       $structure[$i]['name']  = substr($current, 55, strlen($current) - 55);
     }
   return $structure;
  }
     

  function downloadFile($file,$localfile){
  	$this->debug('downloading... '.$file.' ..',false);
  	$retVal = ftp_get($this->conid, $localfile, $file, FTP_BINARY);
  	if ($retVal){
  	  $this->debug('... done');
  	}else{
 	  $this->debug('... failed');
  	  //exit();
  	}
  }
  
  function downloadFile_new($file,$localfile){ 
    $this->debug('downloading... '.$file.' ..',false);
  	//print_r($this->conid);
  	// Download initialisieren
    $ret = ftp_nb_get($this->conid, $localfile, $file, FTP_BINARY);
    while ($ret == FTP_MOREDATA) {
     // Download fortsetzen
     $ret = ftp_nb_continue($this->conid);
    }
    if ($ret != FTP_FINISHED) {
     $this->debug('... failed');
     //TODO: log this
     return ($file);
     //exit(1);
    }else{
      $this->debug('... done');
    }
  }
  
  function uploadFile($remotefile,$localfile){
 	$this->debug('uploading... '.$localfile.' -> '.$remotefile.' ..',false);
  	if (!$this->spider){
  	  if (ftp_put($this->conid, $remotefile, $localfile, FTP_BINARY)) {
        return true;
  	  }else{
  	    return false;
  	  }
  	}else{
  	  usleep($this->_sleep);
  	  return true;	
  	}
  }
  
  function uploadFile_new($remotefile,$localfile){
    $this->debug(sprintf("%-100s %s",">>>UPLOAD>>> $remotefile"," ..."),false);
    $localfile = str_replace("/","\\",$localfile);
  	$err = '';
  	if (!$this->spider){
  	  $ret = ftp_nb_put($this->conid,$remotefile,$localfile,FTP_BINARY);
      while ($ret == FTP_MOREDATA) {
        echo ".";
        $ret = ftp_nb_continue($this->conid);
      }
      if ($ret != FTP_FINISHED) {
        $this->debug(".. failed");
        return false;
      }else{
        $this->debug(".. done");
        return true;	
      }
  	}else{
  	  usleep($this->_sleep);
  	  $this->debug(".. done [ SPIDER ]");
  	  return true;
  	}
  }
  
  function deleteFile($file){
  	$this->debug(sprintf("%-100s %s",">>>DELETE>>> $file"," ..."),false);
    if (!$this->spider){
      if (ftp_delete($this->conid, $file)){
        $this->debug('.. done');
      }else{
        $this->debug('.. failed');
      }
    }else{
      $this->debug('.. done [ SPIDER ]');
    }
  }
  
  function disconnect(){
    $this->debug("Close connection from $this->host ...",false);
    if (!$this->spider){
      ftp_close($this->conid);
      $this->debug(".. done");
    }else{
      $this->debug(".. done [ SPIDER ]");
    }
  }
  
  function debug($msg,$newline=true){
  	if ($this->debug){ 
  	  echo $msg;
  	  if ($newline){
  	    echo "\n";
  	  } 
  	}
  }
  
  private function _setUser($user){
  	if (!is_null($user)){
  	  $this->_un = $user;
  	}
  }

  private function _setPassword($pass){
  	if (!is_null($pass)){
  	  $this->_pw = $pass;
  	}
  }

}
?>