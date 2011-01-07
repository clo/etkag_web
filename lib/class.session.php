<?
class session{
  var $_id=null;
  var $_validated=false;
  var $_cfg_user;
  var $_cfg_pw;

  
  function session(){
  }
  
  function setSessionID($id){
  	$this->_id=$id;
  }
  
  function setUsername($cfg_username){
  	$this->_cfg_user=$cfg_username;
  }
  
  function setPassword($cfg_password){
  	$this->_cfg_pw=$cfg_password;
  }
  
  function start(){
  	if (is_null($this->_id)){
  	  $this->_id=session_start();
  	}
  }
  
  function register($name,$val){
    $_SESSION['$name']=$val; 
  }
  
  function login($username,$password){
   	echo "$password==$this->_cfg_pw";
   	if ($password==$this->_cfg_pw && $username==$this->_cfg_user){
  	  echo "LOGIN: $username $password";
  	  $this->_validated=true;
  	  return true;
  	}else{
  	  echo "NOT LOGIN";
  	  return false;
  	}
  }
  
  function isValidated(){
  	return $this->_validated;
  }
  
  function check($val){
  	if (isset($val['anmelden'])){
  	  if($this->login($val['user'],$val['pw'])){
  	  	return "";
  	  }else{
  	    return "NONONONO";
  	  }
  	}
  }
  
  function loginform($action){
  	echo "<form name='frm' action=$action method='post'>\n";
  	echo "<table>";
  	echo "<tr><td>Benutzername:&nbsp;</td><td><input type='text' name='user'></td></tr>";
  	echo "<tr><td>Passwort:&nbsp;</td><td><input type='password' name='pw'></td></tr>";
  	echo "<tr><td>&nbsp;</td><td><input type='submit' name='anmelden' value='anmelden'></td></tr>";
  	echo "</table>";
  	echo "</form>";
  }
  	
}
?>