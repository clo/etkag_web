<?PHP

class session {

  var $_id = null;
  var $_validated = false;
  var $_cfg_user;
  var $_cfg_pw;
  var $_SESSION = null;

  function session() {
    global $_SESSION;
    $this->_SESSION = & $_SESSION;
  }

  function setSessionID($id) {
    $this->_id = $id;
  }

  function setUsername($username) {
    $this->_cfg_user = $username;
  }

  function setPassword($password) {
    $this->_cfg_pw = $password;
  }

  function start() {
    session_start();
  }

  function stop() {
    session_destroy();
    $this->unregister("loggedin");
    $this->_id = null;
    $this->_validated = false;
  }

  function register($name, $val) {
    $this->_SESSION["$name"] = $val;
  }

  function unregister($name, $val) {
    unset($this->_SESSION["$name"]);
  }

  function login($username, $password) {
    global $g_cfg_username, $g_cfg_password;
    $credentialsOk=false;
    foreach ($g_cfg_username as $id => $val){
      if ($password == $g_cfg_password[$id] &&
          $username == $g_cfg_username[$id]) {
        $credentialsOk = true;
      }
    }
    return $credentialsOk;

//    if ($password == $this->_cfg_pw && $username == $this->_cfg_user) {
//      $this->_id = session_id();
//      $this->_validated = true;
//      $this->register("loggedin", "1");
//      $this->register("username", $this->_cfg_user);
//      return true;
//    } else {
//      return false;
//    }
  }

  function getRegisteredValue($name) {
    return $_SESSION["$name"];
  }

  function isValidated() {
    return $this->_validated;
  }

  function check() {
    if (isset($_POST['user']) && isset($_POST['pass'])) {
      return $this->login($_POST['user'],$_POST['pass']);
    }
  }

  function loginform($action) {
    echo "<form name='frm' action=$action method='post'>\n";
    echo "<table>";
    echo "<tr><td>Benutzername:&nbsp;</td><td><input type='text' name='user' value=''></td></tr>";
    echo "<tr><td>Passwort:&nbsp;</td><td><input type='password' name='pass' value=''></td></tr>";
    echo "<tr><td>&nbsp;</td><td><input type='submit' name='anmelden' value='anmelden'></td></tr>";
    echo "</table>";
    echo "</form>";
  }

  function logout($action) {
    echo "<form name='frm' action=$action method='post'>\n";
    echo "<table>";
    echo "<tr><td>&nbsp;</td><td><input type='submit' name='abmelden' value='abmelden'></td></tr>";
    echo "</table>";
    echo "</form>";
  }

  function getId() {
    return $this->_id;
  }

}

?>