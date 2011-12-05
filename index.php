<?PHP
include("header.php");
//include_once ("./cfg/config.inc.php");

/*
 * include libraries
 */
include_once ("./cfg/menu.cfg.php");
include_once ("./cfg/lang.inc.php");
include_once ("./lib/lib.inc.php");
include_once ("./cfg/layout.inc.php");

include_once ("./lib/class.menu.php");
include_once ("./lib/class.lastmod.php");
include_once ("./lib/class.doc.php");
include_once ("./lib/class.singleton.php");
//include_once ("./lib/class.session.php");
include_once ("./lib/class.pictureresizer.php");

/*
 * top
 */
include("top.php");

/*
 * top navigation bar
 */
$myDoc = new doc();
echo "<div class='topseparator_white'><img class='spacer' src='img/spacer.gif' alt='spacer' /></div>\n";
echo "<div class='topmenu'>\n";
//echo "<div class='topmenu_space'>&nbsp;</div>";
echo "&nbsp;";
$nr = 1;
foreach ($g_topmenu as $site) {
  $pos = menu::getPositionBySite($site);
  echo "<a class='top' href='index.php?site=$site&amp;pos=$pos&amp;level='>" . $myDoc->insertUmlaut(ucfirst($site)) . "</a>\n";
  if ($nr < sizeof($g_topmenu)) {
    echo "&nbsp;|&nbsp;\n";
  }
  $nr++;
}
//rss
//echo "&nbsp;|&nbsp;<a class='top' href='rss.php'>RSS</a>\n";

echo "</div>\n";
echo "<div class='topseparator_white'><img class='spacer' src='img/spacer.gif' alt='spacer' /></div\n";
unset($myDoc);

/*
 * MENU (left hand site)
 */
if ($g_debug) {
  $start = microtime();
}
echo "<div class='mainpane'>\n";
echo "<div class='menu'>\n";
echo "<div class='address'>$contactaddress</div>\n";
$myMenu = new menu();
$myMenu->setMenu($menutree_new);
$myMenu->setPosActual($_GET['pos']);
if (isset($_GET['pos'])) {
  if (!empty($_GET['pos'])) {
    $myMenu->pos_click = $_GET['pos'];
  }
}
if (isset($_GET['level']) && !empty($_GET['level'])) {
  $myMenu->level = $_GET['level'];
} else {
  $myMenu->level_depth = 2;
}
$myMenu->setCSS($menu_class);
$level = 1;
$myMenu->printMenuAsDiv(null);
if ($g_debug) {
  $end = microtime();
  $diff = $end - $start;
  echo "TIMETORUN for menu: " . $diff . "<br />";
}
echo "</div>";
//echo "<div class='menu_bottom'>&nbsp;</div>";

/*
 * MAIN
 */
if (isset($_GET['site']) && $g_debug){
  echo $_SESSION['site'][$_GET['site']];
}
if ($g_debug) {
  $start = microtime();
}
echo "<div class='content'>";
echo "<table class='content'><tr>";
echo "<td class='contentleft'>";
if (!isset($_GET['site'])) {
  if (empty($_GET['site'])) {
    $_GET['site'] = "ueberuns";
    $_GET['pos'] = menu::getPositionBySite($_GET['site']);
    include("ueberuns.php");
  }
} else {
//  if (is_file($_GET['site'] . ".php")) {
    $file = $_GET['site'] . '.php';
    if (is_file($file)){
      include($_GET['site'] . '.php');
    }else{
      include('alternative.php');
    }
//  } else {
//    echo "<p class='error'>" . getErrMsg(1) . "</p>";
//  }
}

echo "</td>";
/*
 *   Menutext|link|on(1)/off(0)|template(1/2/3/4)
 *   template 1: bilder auf der seite werden angezeigt
 *   template 2: bilder auf der seite werden nicht angezeigt
 *   template 3: dokumente auf der seite werden angezeigt -> TODO
 *   template 4: motto, news, aktuelles, motto wird auf der seite angezeigt
 */

/*
 * Template 3
 */
if (preg_match("/1|3/", trim(getTemplateNr($_GET['site'])))) {
  if ($g_debug) {
    $start1 = microtime();
  }
  echo "<td class='contentright'>";
  $pattern = "/\/" . $_GET['site'] . "$/";
  $myDoc = new doc ();
  //$myDoc->find_dir($g_content, $pattern, $dir);
  $dir = $_SESSION['site'][$_GET['site']];
  if (preg_match("/1/", trim(getTemplateNr($_GET['site'])))) {
    $aFiles = $myDoc->getFiles($dir, $g_right_picture_pattern_type);
    $pic = new pictureresizer($myDoc);
    foreach ($aFiles as $file) {
      $linkname = ucfirst($myDoc->formatLinkName(basename($file), true, true, "", "", false, true));
      list ($picwidth, $picheight) = $pic->getImgSize($dir . "/" . $file);
      if ($picwidth > $g_max_right_picture_width) {
        $width = $g_max_right_picture_width;
      } else {
        $width = $picwidth;
      }
      echo "<a $g_lytebox class='main' border='0' href='$dir/$file' title='$linkname'>";
      echo "<img width='$width' class='etkag' src='$dir/$file' alt='$file' />";
      echo "</a>";
      if ($g_debug){
        $size = " (" . sprintf("%d",filesize($dir.'/'.$file) / 1024) . " KBytes)";
      }else{
        $size = "";
      }
      echo "<p class='pictext'>" . $linkname . $size . "<br /></p>";
    }
    unset($pic);
    if ($g_debug) {
      $end1 = microtime();
      $diff1 = $end1 - $start1;
      echo "TIMETORUN for picuter resizing: " . $diff1 . "<br/>";
    }
    echo "</td>";
  /*
   * Template 3
   */
  } elseif (preg_match("/3/", trim(getTemplateNr($_GET['site'])))) {
    $aFiles = $myDoc->getFiles($dir, $g_right_doc_pattern_type);
    foreach ($aFiles as $file) {
      $linkname = ucfirst($myDoc->formatLinkName(basename($file), true, true, "", "", false, true));
      echo "<li><a class='main' href='$dir/$file' target='_new' alt='$file'>$linkname</a></li>\n";
    }
  }
  /*
   * Template 4
   * News, Anlässe und Mottos auf der Seite
   */
} elseif (preg_match("/4/", trim(getTemplateNr($_GET['site'])))) {
  if ($g_debug) {
    $start2 = microtime();
  }
  echo "<td class='contentright'>";
  $aMenu = explode("|", $g_content_right_with_t4);
  $myDoc = singleton::getInstance("doc");
  foreach ($aMenu as $val) {
    echo "<table class='contentrightinfo' cellspacing='0'>\n";
    list($value, $nrOfContent) = explode(";", $val);
    echo "<tr>";
    echo "<td class='contentrightinfoheader'>";
    echo $myDoc->insertUmlaut(ucfirst($value));
    if (isset($g_rss[$value]) && $g_rss[$value]){
      echo "&nbsp;<a href='rss.php?channel=$value'><img src='img/rss.png' border='0' alt='rss' /></a></td>\n";
    }
    echo "</tr>";
    echo "<tr><td>";
    //$myDoc->find_dir(null, "/\/$value$/", $dir);
    $dir = $_SESSION['site'][$value];
    $aDir = $myDoc->getFolders($dir, false);
    $aDir = $myDoc->sortArr($aDir);
    $i = 1;
    foreach ($aDir as $dir) {
      if ($i <= $nrOfContent) {
        $pos = menu::getPositionBySite($value);
        $linkname = $myDoc->formatLinkName($dir, true, true);
        $linknameShort = substr($linkname,0,30);
        if (strlen($linkname) > 30){
          $linknameShort = $linknameShort . "...";
        }
        if (isset($g_dateFormat[$value])){
          $format=$g_dateFormat[$value];
        }else{
          $format = null;
        }
        echo $myDoc->getDate($dir,$format) . ": ";
        echo "<a class='main' href='index.php?site=$value&amp;pos=$pos&amp;level=&amp;dir=$dir'>" . 
             $linknameShort .
             "</a>";
        echo "<br />\n";
      }else{
        continue;
      }
      $i++;
    }
    echo "</td></tr>";
    echo "<tr><td align='right'>";
    $pos = menu::getPositionBySite($value);
    echo "<a class='main' href='index.php?site=$value&amp;pos=$pos&amp;level='>$g_morebutton</a>\n";
    echo "</td></tr>";
    echo "</table>\n";
    echo "<br />";
  }
  if ($g_debug) {
    $end2 = microtime();
    $diff2 = $end2 - $start2;
    echo "TIMETORUN for news: " . $diff2 . "<br/>";
  }
  echo "</td>";
}

if ($g_debug) {
  $end = microtime();
  $diff = $end - $start;
  echo "TimeToRun for main: " . $diff . " seconds";
}
//print_r($_SESSION);
echo "</tr></table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
/*
 * footer
 */
include("bottom.php");
?>
</body>
</html>