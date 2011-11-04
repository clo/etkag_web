<?PHP
include("header.php");
if ($_GET['w']=='dok'){
  $title = "Dokumente";
}elseif($_GET['w']=='fot'){
  $title = "Fotos";
}
$pattern="/anlaesse$/";
//$myDoc=new doc();
//$myDoc->find_dir($g_content,$pattern,$base);
//unset($myDoc);
$base = $_SESSION['site'][$_GET['site']];
$myDoc = new doc($base);
$picasa_albumid = "";
$youtube_albumid = "";
?>
<h3 class="contenttitle">
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
/*
 * Show all directories
 */
if (!isset($_GET[dir])){
  //include("picasa_list_album.php");
  $dir_arr = $myDoc->getFolders($base,false);
  $dir_arr = $myDoc->sortArr($dir_arr);
  if (!empty($dir_arr)){
    echo "<table class='content' border='0'>";
    foreach ($dir_arr as $key => $file) {
      $info_arr = array();
      if ($myDoc->getDate($file) >= date('%d.%m.%Y')){
        $linkname = $myDoc->formatLinkName($file,true,true);
        echo "<tr>";
        echo "<td width='500'>";
        echo $myDoc->getDate($file,'d.m.Y').":&nbsp;";
        echo "<a class=main href='index.php?site=anlaesse&dir=$file&pos=$_GET[pos]&level=' target='_top'>$linkname</a></td>";
        echo "<td>&nbsp;</td>";
        echo "</tr>";
      }
    }
    echo "</table>";
  }else{
    echo "<p>";
    echo getErrMsg(3);
    echo "</p>";
  }
/*
 * show alle pictures, videos and documents in a selected directory
 * pictures and videos has to be configured in info.php
 * documents can just reside in this directory
 */
}else{
  }
  $file_arr = $myDoc->getFiles($base."/".$_GET[dir],".*php$|.*txt$");

  if (count($file_arr)>0){
    foreach($file_arr as $key => $file) {
      if (preg_match("/\.php$/",$file)){
        //include($base."/".$_GET[dir]."/".$file);
        echo "<br>";
      }
      if (preg_match("/google\.txt/",$file)){
        $content = $myDoc->getFileContent($base."/".$_GET[dir]."/google.txt");
        $aContent = split("\n",$content);
        foreach ($aContent as $line){
          list($variable,$value) = split("=",$line);
          //echo "$variable = $value";
          if ($variable == "google_picasa_albumid" && !empty($value)){
            $picasa_albumid = "$value";
          }
          if ($variable == "google_youtube_videoid" && !empty($value)){
            $youtoube_viedoid = "$value";
          }
        }
        if (isset($picasa_albumid)){
          //$_GET[picasa_albumid] = "$picasa_albumid";
          include("picasa_list_albumphotos.php");
        }
        //if (isset($youtoube_viedoid)){
           //$_GET[picasa_viedeoid] = "$youtoube_videoid";
           //include("youtube_list_video.php");
        //}
      }
    }
  }

  
  echo "<table class='content' border='0'>";
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
              "rel='lytebox[group]' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img class='etkag' src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "<td width=120>";
       $i++;
       if ($i<count($file_arr)){
         $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
         $image = $base."/".$_GET['dir']."/".$file_arr[$i];
         echo "<a class=main " .
              "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
              "rel='lytebox[group]' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img class='etkag' src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
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
              "rel='lytebox[group]' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img class='etkag' src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
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
              "rel='lytebox[group]' " .
              "onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\"" .
              "target='_new'>".
              "<img class='etkag' src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0>".
              "</a><br>".
              "<div class='pictext_left'>$linkname</div>";
       }
       echo "</td>";
       echo "</tr>";
    }  
  
  echo "</table>";   
}

?>
<p><a class=main href="javascript:history.back(-1);">> zur&uuml;ck <</a></p>

