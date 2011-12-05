<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$dir = myrscandir("../doc/hauptseite", $dir);
echo "<pre>";
print_r($dir);
print_r($_SESSION);
echo "</pre>";


function myrscandir($path=null) {
  global $g_content;
  if (is_null($path)) {
    $path = $g_content;
  }
  $dh = opendir($path);
  while (($file = readdir($dh)) !== false) {
    $fullname = $path . "/" . $file;
    if (is_dir($fullname) && $file != ".." && $file != ".") {
      $_SESSION['site'][$file] = "$fullname";
      myrscandir($fullname, $value);
    }
  }
  closedir($dh);
}

function scandir_recursive($directory) {
  $folderContents = array();
  $directory = realpath($directory) . DIRECTORY_SEPARATOR;

  foreach (scandir($directory) as $folderItem) {
    if ($folderItem != "." AND $folderItem != "..") {
      if (is_dir($directory . $folderItem . DIRECTORY_SEPARATOR)) {
        $_SESSION['site'][$folderItem] =
                $folderContents[$folderItem] = scandir_recursive($directory . $folderItem . "\\");
      } else {
        $folderContents[] = $folderItem;
      }
    }
  }

  return $folderContents;
}

function dir_walk($callback, $dir, $types = null, $recursive = false, $baseDir = '') {
  if ($dh = opendir($dir)) {
    while (($file = readdir($dh)) !== false) {
      if ($file === '.' || $file === '..') {
        continue;
      }
      if (is_file($dir . $file)) {
        if (is_array($types)) {
          if (!in_array(strtolower(pathinfo($dir . $file, PATHINFO_EXTENSION)), $types, true)) {
            continue;
          }
        }
        $callback($baseDir . $file);
      } elseif ($recursive && is_dir($dir . $file)) {
        dir_walk($callback, $dir . $file . DIRECTORY_SEPARATOR, $types, $recursive, $baseDir . $file . DIRECTORY_SEPARATOR);
      }
    }
    closedir($dh);
  }
}

function getDirectoryTree($outerDir) {
  $dirs = array_diff(scandir($outerDir), Array(".", ".."));
  $dir_array = Array();
  foreach ($dirs as $d) {
    if (is_dir($outerDir . "/" . $d))
      $dir_array[$d] = getDirectoryTree($outerDir . "/" . $d);
    else
      $dir_array[$d] = $d;
  }
  return $dir_array;
}

function rscandir($base='', &$data=array()) {

  $array = array_diff(scandir($base), array('.', '..')); # remove ' and .. from the array */

  foreach ($array as $value) : /* loop through the array at the level of the supplied $base */

    if (is_dir($base . $value)) : /* if this is a directory */
      $data[] = $base . $value . '/'; /* add it to the $data array */
      $data = rscandir($base . $value . '/', $data); /* then make a recursive call with the
      current $value as the $base supplying the $data array to carry into the recursion */

    elseif (is_file($base . $value)) : /* else if the current $value is a file */
      $data[] = $base . $value; /* just add the current $value to the $data array */

    endif;

  endforeach;

  return $data; // return the $data array
}

?>
