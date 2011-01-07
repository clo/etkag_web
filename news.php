<?
include("header.php");
if ($_GET['w']=='dok'){
  $title = "Dokumente";
}elseif($_GET['w']=='fot'){
  $title = "Fotos";
}
$base="./doc/news";
$myDoc = new doc($base);
?>
<h3><? 
if (isset($_GET['dir'])){
  echo $myDoc->getDate($_GET['dir']).": ";
}else{
  echo "News";
}
echo $myDoc->formatLinkName($_GET['dir'],true,true);
?></h3>
<?

if (!isset($_GET[dir])){
  $dir_arr = $myDoc->getFolders($base,false);
  $dir_arr = $myDoc->sortArr($dir_arr);
  if (!empty($dir_arr)){
    echo "<table class=ref border=0>";
    foreach ($dir_arr as $key => $file) {
      $info_arr = array();
      if ($myDoc->getDate($file) >= date('%d.%m.%Y')){
      	$linkname = $myDoc->formatLinkName($file,true,true,"etkag_",null,false,false);
        //unset($_GET[dir]);
        echo "<tr>";
        echo "<td width=100>";
        echo $myDoc->getDate($file,'d.m.Y').":</td>";
        echo "<td><a class=main href='index.php?site=news&dir=$file' target='_top'>$linkname</a></td>";
        echo "</tr>";
      }
    }
    echo "</table>";
  }else{
    echo "<p>";
    echo getErrMsg(3);
    echo "</p>";
  }
}else{
  echo "<table class=ref border=0>";
  $content = $myDoc->getFileContent($base."/".$_GET[dir]."/info.txt");
  echo "<tr><td=width=300>";
  echo "<p>".$content."</p>";
  echo "</td></tr>";
  $myDoc->path=$base."/".$_GET[dir];
  if ($myDoc->docAvailable()){
    $file_arr = $myDoc->getFiles(null,"pdf$|etkag_.*jpg$");
    foreach ($file_arr as $key => $file){
      $linkname = $myDoc->formatLinkName($file,false,true,"etkag_",null,false,true);
      echo "<tr>";
      echo "<td width=300>";
      echo "<a class=main href='$base/".$_GET[dir]."/$file' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a></td>";
      echo "</tr>";
    }  
  } 
  echo "</table>";   
}

?>
<p><a class=main href="javascript:history.back(-1);">> zurück <</a></p>
<?
include("footer.php");
?>
