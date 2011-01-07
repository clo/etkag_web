<?PHP
include("cfg/error.inc.php");

function constructVar(&$arr,$excludevar){
	$retval = '';
	foreach ($arr as $var => $val){
		if ($var != $excludevar){
			$retval .= "&".$var."=".$val;
		}
	}
	return $retval;
}

function getPictureLink($dir){
	$link = '';
	$err = '';
	if (is_dir($dir)){
		$dh = opendir($dir);
		$file_arr = array();
		while (($file = readdir($dh)) !== false) {
          if (eregi(".*(.jpg|.gif)$",$file)){
            $file_arr[] = $file; 	
          }
        }	
		closedir($dh);
		$randomnr = getRandomNr(0,count($file_arr)-1);
		$link=$file_arr[$randomnr];
	}else{
		$err = getErrMsg(0);
	}
	return array($link,$err);
}

function getErrMsg($errnr){
  global $error;
  return $error[$errnr];
}

function getRandomNr($from,$to){
  srand((double)microtime()*1000000);  
  return rand($from,$to); 
}

function replaceUmlaut($word){
	$word=str_replace("ae","&auml;",$word);
	$word=str_replace("ue","�",$word);
	return $word;
}

function buildParam($arr,$start='start'){
  if ($start){
    $str='?';
  }
  if(!empty($str)){
    foreach($arr as $key => $val){
      $str .= $key.'='.$val.'&';
    }
    $str = substr($str,0,strlen($str)-1);
    return $str;
  }else{
    return null;
  }
}

function compDate($d1,$d2=''){
  if (empty($d2)){
    $d2 = date('Ymd');
  }
  
  $d = substr($d1,0,2);
  $m = substr($d1,3,2);
  $y = substr($d1,6,4);
  $d1 = $y.$m.$d; 
  
  if ($d1 > $d2){
    return 1;
  }
  if ($d1 == $d2){
    return 0;
  }
  if ($d1 < $d2){
    return 2;
  }
}

function MakeDirectory($dir, $mode = 0755){
  if (is_dir($dir) || @mkdir($dir,$mode)) return TRUE;
  if (!MakeDirectory(dirname($dir),$mode)) return FALSE;
  return @mkdir($dir,$mode);
}

function logit($msg,$newline=true){
  global $pendingfilestodownload;
  
  $fs = fopen($pendingfilestodownload,"a+");
  if (!$newline) {
    fwrite($fs,date("d.m.Y H:i:s > "));
  }
  fwrite($fs,$msg);
  if ($newline){
  	fwrite($fs,"\r\n");
  }
  fclose($fs);
}

function leave(){
  $this->logit("Program terminated.");
  exit;
}

function __autoload($class_name) {
    require_once '../lib/class.'.$class_name.'.php';
}


?>