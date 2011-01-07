<?PHP
include("header.php");
if ($_GET['w']=='dok'){
  $title = "Dokumente";
}elseif($_GET['w']=='fot'){
  $title = "Fotos";
}
$base="./doc/anlass";
$myDoc = new doc($base);
?>
<h3>
<?PHP
if (isset($_GET['dir'])){
  echo $myDoc->getDate($_GET['dir']).": "; 
}else{
  echo "Anl&auml;sse";
}
echo $myDoc->formatLinkName($_GET['dir'],true,true);
?>
</h3>
<?PHP
if (!isset($_GET[dir])){
  $dir_arr = $myDoc->getFolders($base,false);
  $dir_arr = $myDoc->sortArr($dir_arr);
  if (!empty($dir_arr)){
    echo "<table class=ref border=0>";
    foreach ($dir_arr as $key => $file) {
      $info_arr = array();
      if ($myDoc->getDate($file) >= date('%d.%m.%Y')){
        $linkname = $myDoc->formatLinkName($file,true,true);
        echo "<tr>";
        echo "<td>";
        echo $myDoc->getDate($file,'d.m.Y').":&nbsp;";
        echo "<a class=main href='index.php?site=anlaesse&dir=$file' target='_top'>$linkname</a></td>";
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
  
  // pdf dateien anzeigen
  $file_arr = $myDoc->getFiles($base."/".$_GET[dir],".*pdf$");
  if (!empty($file_arr)){
    foreach ($file_arr as $key => $file) {
      echo "<tr>";
      echo "<td width=300 colspan=4>";
      $linkname = $myDoc->formatLinkName($file,false,false,"","",false,true);
      $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
      echo "$pic&nbsp;<a class=main href='".$base."/".$_GET[dir]."/$file' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a></td>";
      echo "</tr>";
    }
    echo "<tr><td colspan=4>&nbsp;</td></tr>";
  }
  
  
  $myDoc->path=$base."/".$_GET['dir'];
  if ($myDoc->docAvailable()){
     $file_arr = $myDoc->getFiles($base."/".$_GET[dir],"jpg$");
     for ($i=0; $i<count($file_arr);$i++) {
       echo "<tr>";
       echo "<td width=120>";
       //echo "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0><br>";
       if ($i<count($file_arr)){
  	     $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
         echo "<a class=main " .
              "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "<td width=120>";
       $i++;
       if ($i<count($file_arr)){
         $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
         echo "<a class=main " .
              "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "<td width=120>";
       $i++;
       if ($i<count($file_arr)){
         $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
         echo "<a class=main " .
              "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "<td width=120>";
       $i++;
       if ($i<count($file_arr)){
         $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
         echo "<a class=main " .
              "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "</tr>";
    }  
  } 
  echo "</table>";   
}

?>
<p><a class=main href="javascript:history.back(-1);">> zur�ck <</a></p>
<?PHP
include("footer.php");
?>
