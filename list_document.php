<?php

/*
 * list_document.php
 * This document lists all documents from a directory.
 */
// dokumente anzeigen
if (isset($myDoc)) {
  $file_arr = $myDoc->getFiles(null, $g_document_to_show);
  if (!empty($file_arr)) {
    foreach ($file_arr as $key => $file) {
      if (preg_match("/php$/", $file)) {
        include($base . "/" . $_GET['dir'] . "/" . $file);
      } else {
        $linkname = $myDoc->formatLinkName($file, false, false, "", "", false, true);
        $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($file));
        echo "$pic&nbsp;<a class=main href='" . $myDoc->path . "/" . $file . "' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>$linkname</a><br />";
      }
    }
    echo "<br />\n";
  }
  
} else {
  echo "WARNING: doc ist nicht gesetzt.";
}
?>
