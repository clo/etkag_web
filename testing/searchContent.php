<?php
set_include_path("lib;".  get_include_path());
include_once ("../cfg/config.inc.php");
error_reporting($g_error_reporting);
include_once ("../lib/menu.cfg.php");
include_once ("../cfg/lang.inc.php");
include_once ("../lib/lib.inc.php");
include_once ("../cfg/layout.inc.php");
include_once ("../lib/class.menu.php");
include_once ("../lib/class.lastmod.php");
include_once ("../lib/class.doc.php");
include_once ("../lib/class.singleton.php");
include_once ("../lib/class.session.php");
$dir =  "/werkstatt$/";
echo "Looking for directory: ".$dir."\n";
//echo "Directory: ".$myDoc->searchDirectory("../doc/hauptmenu",$dir);
//echo $myDoc->find_dir("../doc/hauptmenu",$dir);
$value="NOTHING";
find_dir("../doc/hauptmenu",$dir,$value);
echo $value;

  function find_dir($path, $pattern, &$value) {
    $dirname="";
    $dh = opendir($path);
    while (($file = readdir($dh)) !== false) {
      $fullname = $path."/".$file;
      //print $fullname."\n";
      if (is_dir($fullname) && preg_match($pattern,$fullname)){
        $value=$fullname;
      }
      if (is_dir($fullname) && $file != ".." && $file != "."){
        find_dir($fullname,$pattern,$value);
      }
    }
    closedir($dh);
    return $dirname;
  }

function find_dir_recursive(){
  $it = new RecursiveDirectoryIterator("../doc/hauptmenu/");
  foreach(new RecursiveIteratorIterator($it) as $val => $cur) {
    if(preg_match("/.*$dir\\\info.txt$/",$val)){
        echo $val ."<br>";
    }
  }
}
?>
