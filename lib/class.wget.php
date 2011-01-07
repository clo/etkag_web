<?PHP
/*
 * wget -xr -A "*JPG,*jpg" -R "etkag_*"  http://www.etkag.ch/doc/
 */
class wget{
  private $_user;
  private $_pass;
  private $_path;
  private $_prog;
  private $_options;
  private $_url;
  private $_exclude;
  private $_exludedir;
  private $_include;
  private $_deleteafter;
  private $_cmd;
  private $_out;
  
  function __construct($username,$password,$url=null,&$out=null,$delete=false){
    $this->_path = 'H:/download/wget';
    $this->_prog = 'wget.exe';
    $this->_exclude = 'etkag_*,Thumbs.db';
    $this->_include = '*jpg,*JPG';
    $this->_excludedir = 'logos,organigramm';
    //$this->_options = "-xr --passive-ftp non-verbose";
    $this->_options = "-xr --passive-ftp non-verbose";
    $this->_user = $username;
    $this->_pass = $password;
    $this->_setUrl($url);
    $this->_setOut($out);
    $this->_setDeleteAfter($delete);
  }
  
  function __destruct(){
  	
  }
  
  public function run(){
  	$this->_buildCmd();
  	$this->_out->debug("<<<DOWNLOAD<<< ...");
  	$this->_out->debug("\t $this->_cmd");
  	print_r($this);
  	system($this->_cmd);
  } 
  
  private function _buildCmd(){
    $tmp = array();
  	$tmp[] = $this->_path.'/'.$this->_prog;
  	$tmp[] = $this->_options;
  	$tmp[] = "-A ".$this->_include."";
  	$tmp[] = "-R ".$this->_exclude."";
  	$tmp[] = "-X ".$this->_excludedir."";
  	if ($this->_deleteafter){
  	  $tmp[] = '--delete-after';
  	}
  	$tmp[] = $this->_url;
  	$this->_cmd = implode(" ",$tmp);
  }
  
  private function _setUrl($url){
  	if (!is_null($url)){
  	  $aUrl = parse_url($url);
  	  $newurl = $aUrl['scheme'].'://'.$this->_user.':'.$this->_pass."@".$aUrl['host'].$aUrl['path'];
  	  $this->_url = $newurl;
  	}
  }
  
  private function _setOut(&$out){
  	if (!is_null($out)){
  	  $this->_out = $out;
  	}
  }

  private function _setDeleteAfter($del){
  	if (!is_null($del)){
  	  $this->_deleteafter = $del;
  	}
  }
}
?>