<?PHP

error_reporting(E_ALL);

include("../lib/class.doc.php");
$doc = new doc();

/*
 * parameters
 */
$localInstaPath = "Z:\\LOC\\kjoff\\etkag2\\doc\\hauptseite";
$aBase = array();
$doc->myrscandir($localInstaPath, $aBase);
//print_r($aBase);
//$aBase = array(
//    //$localInstaPath."\\etkag2\\doc\\hauptseite",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\aktuell\\anlaesse",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\produkte",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\produkte",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\aktuell\\anlaesse",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\aktuell\\news",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\aktuell\\jahresmotto",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\aktuell\\news",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\qualitaetssicherung\\schulung",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\qualitaetssicherung",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\referenzobjekte",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\produkte\\schaltanlagen",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\produkte\\schaltanlagen\\hausverteilung",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\ueberuns\\geschichte",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\ueberuns\\infrastruktur",
//    $localInstaPath . "\\etkag2\\doc\\hauptseite\\ueberuns"
//);
//$filetype = ".jpg$|.tiff$|.tif$|.bmp$|.gif$";
$filetype = ".jpg$|.tif$|.gif$";
$convertprog = "Z:\\LOC\\Program Files\\xnview\\XnView\\nconvert.exe";

/*
 * main prog
 */
$exit = 0;
foreach ($aBase as $base) {
  if (!is_dir($base)) {
    echo "WARNUNG: Dieses Verzeichnis existiert nicht: $base\n";
    $exit = 1;
    continue;
  }
  echo $base . "\n";
  $dh = opendir($base);
  while (($dir = readdir($dh)) !== false) {
    if (!preg_match("/\.{1,2}/", $dir)) {
      $ndir = $base . '\\' . $dir;
      $ndh = opendir($ndir);
      while (($file = readdir($ndh)) !== false) {
        if (preg_match("/$filetype/i", $file)) {
          $error = "";
          $size = filesize($ndir . '\\' . $file);
          if ($size > 100000) {
            $nfile = $ndir . "\\" . $file;
            $ftype = substr($file,strlen($file)-3,strlen($file));
            $filename = str_replace(".$ftype","",$file);
            echo $file.":".$filename."|".$ftype."\n";
            $ofile = $ndir . "\\" . $filename . "_" . "." . $ftype;
            if (!preg_match("/.*_$/", $filename) || preg_match("/\/logo$|schaltanlagen$/",$ndir)) {
              echo $nfile . " ...";
              //$nfile = str_replace("\\","\\\\",$nfile);
              $cmd = "\"$convertprog\" " .
                      //"-text_pos 10 -10 -text_flag bottom-left -text_color 255 255 255 -text_font arial 50 -text \"ETK Elektrotableau Kalbermatter AG\" " .
                      "-o \"$ofile\" " .
                      "-quiet " .
                      "-out jpeg " .
                      "-q 50  " .
                      "-ratio " .
                      "-resize 800 0 " .
                      "-D " .
                      "\"$nfile\"";
              //echo $cmd . "\n";
              $error = shell_exec($cmd);
              if ($error == "") {
                echo ".. done\n";
              } else {
                echo ".. failed [ERROR: $error]\n";
              }
            }
          }
        }
      }
      closedir($ndh);

      //create info file
      $ndh = opendir($ndir);
      $nr = 0;
      $docnr = 0;
      $picnr = 0;
      $picmatched = false;
      $docmatched = false;
      while (($file = readdir($ndh)) !== false) {
        if (!preg_match("/\.{1,2}/", $dir)) {
          // 1 = pic, 2 = doc, 3 = pic + doc
          if (preg_match("/.jpg$|.JPG$/", $file)) {
            $picnr += 1;
          }
          if (preg_match("/.pdf$|.PDF$/", $file)) {
            $docnr += 1;
          }
          if (preg_match("/.jpg$|.JPG$/", $file) && !$picmatched) {
            $nr = $nr + 1;
            $picmatched = true;
          }
          if (preg_match("/.pdf$|.PDF$/", $file) && !$docmatched) {
            $nr = $nr + 2;
            $docmatched = true;
          }
        }
      }
      $exists = file_exists("$ndir.\\info.txt");
      //printf("%-150s%-5s%-5s%s\n",$ndir,$picnr,$docnr,$exists);
      if ($nr > 0) {
        if (!file_exists("$ndir.\\info.txt")) {
          echo "info.txt existiert nicht\n";
          $fh = fopen("$ndir.\\info.txt", "a+");
          if (preg_match("/2/", $nr)) {
            fwrite($fh, "#DOKUMENT###\r\n");
          }
          if (preg_match("/1/", $nr)) {
            fwrite($fh, "#BILD#\r\n");
          }
          if (preg_match("/3/", $nr)) {
            fwrite($fh, "#DOKUMENT###\r\n");
            fwrite($fh, "#BILD#\r\n");
          }
          fclose($fh);
        }
      }
      closedir($ndh);
    }
  }
  closedir($dh);
}
exit($exit);
?>