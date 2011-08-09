<?PHP
include("header.php");
include_once ("./cfg/config.inc.php");
error_reporting($g_error_reporting);

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
include_once ("./lib/class.session.php");
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
//Admin
echo "&nbsp;|&nbsp;<a class='top' href='index.php?site=login'>Admin";
if (isset($_SESSION['loggedin'])) {
  echo "&nbsp;(" . $_SESSION['username'] . ")";
}
echo "</a>\n";
echo "</div>\n";
echo "<div class='topseparator_white'><img class='spacer' src='img/spacer.gif' alt='spacer' /></div\n";
unset($myDoc);

/*
 * MENU (left hand site)
 */
echo "<div class='mainpane'>";
echo "<div class='menu'>";
echo "<div class='address'>$contactaddress</div>";
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
echo "</div>";
//echo "<div class='menu_bottom'>&nbsp;</div>";

/*
 * MAIN
 */
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
  if (is_file($_GET['site'] . ".php")) {
    include($_GET['site'] . '.php');
  } else {
    echo "<p class='error'>" . getErrMsg(1) . "</p>";
  }
}
echo "</td>";
echo "<td class='contentright'>";
/*
 *   Menutext|link|on(1)/off(0)|template(1/2/3/4)
 *   template 1: bilder auf der seite werden angezeigt
 *   template 2: bilder auf der seite werden nicht angezeigt
 *   template 3: dokumente auf der seite werden angezeigt -> TODO
 *   template 4: motto, news, aktuelles, motto wird auf der seite angezeigt
 */
if (preg_match("/1|3/", trim(getTemplateNr($_GET['site'])))) {
  $pattern = "/\/" . $_GET['site'] . "$/";
  $myDoc = new doc ();
  $myDoc->find_dir($g_content, $pattern, $dir);
  if (preg_match("/1/", trim(getTemplateNr($_GET['site'])))) {
    $aFiles = $myDoc->getFiles($dir, $g_right_picture_pattern_type);
    foreach ($aFiles as $file) {
      $linkname = ucfirst($myDoc->formatLinkName(basename($file), true, true, "", "", false, true));
      $pic = new pictureresizer($myDoc);
      list ($picwidth, $picheight) = $pic->getImgSize($dir . "/" . $file);
      if ($picwidth > $g_max_right_picture_width) {
        $width = $g_max_right_picture_width;
      } else {
        $width = $picwidth;
      }
      echo "<a $g_lytebox class='main' border='0' href='$dir/$file' title='$linkname'>";
      echo "<img width='$width' class='etkag' src='$dir/$file' alt='$file' />";
      echo "</a>";
      echo "<span class='pictext'>" . $linkname . "<br /></span>";
      unset($pic);
    }
  } elseif (preg_match("/3/", trim(getTemplateNr($_GET['site'])))) {
    $aFiles = $myDoc->getFiles($dir, $g_right_doc_pattern_type);
    foreach ($aFiles as $file) {
      $linkname = ucfirst($myDoc->formatLinkName(basename($file), true, true, "", "", false, true));
      echo "<li><a class='main' href='$dir/$file' target='_new' alt='$file'>$linkname</a></li>\n";
    }
  }
} elseif (preg_match("/4/", trim(getTemplateNr($_GET['site'])))) {

  $aMenu = explode("|", $g_content_right_with_t4);
  foreach ($aMenu as $val) {
    echo "<table class='contentrightinfo' cellspacing='0'>\n";
    list($value, $nrOfContent) = explode(";", $val);
    echo "<tr>";
    echo "<td class='contentrightinfoheader'>";
    echo ucfirst($value);
    echo "&nbsp;<a href='rss.php?channel=$value'><img src='img/rss.png' border='0' /></a></td>\n";
    echo "</tr>";
    echo "<tr><td>";
    $myDoc = singleton::getInstance("doc");
    $myDoc->find_dir(null, "/\/$value$/", $dir);
    $aDir = $myDoc->getFolders($dir, true);
    $i = 1;
    foreach ($aDir as $dir) {
      if ($i <= $nrOfContent) {
        $pos = menu::getPositionBySite($value);
        echo $myDoc->getDate($dir) . ": ";
        echo "<a class='main' href='index.php?site=$value&amp;pos=$pos&amp;level=&amp;dir=$dir'>" . $myDoc->formatLinkName($dir, true, true) . "</a>";
        echo "<br />\n";
      }
      $i++;
    }
    echo "</td></tr>";
    echo "<tr><td align='right'>";
    $pos = menu::getPositionBySite($value);
    echo "<a class='main' href='index.php?site=$value&amp;pos=$pos&amp;level='>mehr...</a>\n";
    echo "</td></tr>";
    echo "</table>\n";
    echo "<br />";
  }
}

echo "</td>";
echo "</tr></table>";
echo "</div>";
echo "</div style='clear: left;background-color: red;'>";
echo "</div>";
/*
 * footer
 */
include("bottom.php");
?>
</body>
</html>