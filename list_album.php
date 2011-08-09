<?php
echo "<table class=content border=0>";
if ($myDoc->docAvailable()){
$file_arr = $myDoc->getFiles($base."/".$_GET['dir'],"jpg$|JPG$");
for ($i=0; $i<count($file_arr);$i++) {
  echo "<tr>";
  echo "<td width=120>";
  //echo "<img src='img.php?file=".$base."/".$_GET['dir']."/".$file_arr[$i]."' border=0><br>";
  if ($i<count($file_arr)){
    $linkname = $myDoc->formatLinkName($file_arr[$i],false,true,"etkag_",null,false,true);
    echo "<a class=main " .
         "rel='lytebox[group]'" .
         "title='$linkname'" .
         "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
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
     echo "<a class=main  " .
          "rel='lytebox[group]'" .
          "title='$linkname'" .
          "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
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
          "rel='lytebox[group]' " .
          "title='$linkname'" .
          "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
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
          " rel='lytebox[group]'" .
          "title='$linkname'" .
          "href='$base/".$_GET['dir']."/".$file_arr[$i]."' " .
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
