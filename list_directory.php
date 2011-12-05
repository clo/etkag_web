<?PHP

/*
 * This file is listing all direcotries of a given 
 * directory.
 * e.g. <date>_<some_text>, 01022011_hallo_zusammen
 */
if (!isset($showTitel)) {
  $showTitle = true;
}
$dir_arr = $myDoc->getFolders(null, false);
$dir_arr = $myDoc->sortArr($dir_arr);
if (!empty($dir_arr)) {
  echo "<table class='content'>";
  foreach ($dir_arr as $key => $file) {
    $info_arr = array();
    if ($myDoc->getDate($file) >= date('%d.%m.%Y')) {
      $linkname = $myDoc->formatLinkName($file, true, true, "etkag_", null, false, false);
      $pos = menu::getPositionBySite($_GET['site']);
      if (!isset($g_showYearSeparation[$_GET['site']]) || $g_showYearSeparation[$_GET['site']]) {
        $new = $myDoc->getDate($file, 'Y');
        if ($old != $new) {
          echo "<tr><td colspan='2'><b>Jahr $new</b></td></tr>";
        }
      }
      echo "<tr>";
      if (!isset($g_showDate[$_GET['site']]) || $g_showDate[$_GET['site']]){
        if (isset($g_dateFormat[$_GET['site']])){
          $format=$g_dateFormat[$_GET['site']];
        }else{
          $format = null;
        }
        echo "<td width='80'>";
        echo $myDoc->getDate($file,$format) . ":";
        echo "</td>";
      }
      echo "<td width='700'><a class='main' href='index.php?pos=$pos&amp;dir=$file&amp;site=" . $_GET['site'] . "' target='_top'>$linkname</a></td>";
      echo "</tr>";
      $old = $myDoc->getDate($file, "Y");
    }
  }
  echo "</table>";
} else {
  echo "<p>";
  echo getErrMsg(5);
  echo "</p>";
}
?>
