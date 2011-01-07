<?PHP
include("header.php");

echo "<h3>Admin</h3>";
$s =& singleton::getInstance("session");
$msg = $s->check($_POST);

if(!$s->isValidated()){
  //the user is not logged in
  $s->loginform('admin.php');
  print $msg;
}else{
  //the user is logged in
  echo "TODO: logged in";
}
print_r($s);
include("footer.php");
?>