<?PHP
error_reporting(E_ALL);

/*
 * parameters
 */
$localInstaPath = "Z:\\LOC\\kjoff";
$aBase = array (
  $localInstaPath."\\etkag2\\doc\\hauptseite\\aktuell\\anlaesse",
  $localInstaPath."\\etkag2\\doc\\hauptseite\\aktuell\\news",
  $localInstaPath."\\etkag2\\doc\\hauptseite\\aktuell\\motto",
  $localInstaPath."\\etkag2\\doc\\hauptseite\\aktuell\\news",
  $localInstaPath."\\etkag2\\doc\\hauptseite\\qualitaetssicherung\schulung"
);
$convertprog = "Z:\\LOC\\Program Files\\xnview\\XnView\\nconvert.exe";

/*
 * main prog
 */
$exit = 0;
foreach ($aBase as $base) {
  if (!is_dir($base)){
    echo "WARNUNG: Dieses Verzeichnis existiert nicht: $base\n";
    $exit=1;
    continue;
  }
  echo $base . "\n";
  $dh = opendir($base);
  while (($dir = readdir($dh)) !== false) {
    if (!preg_match("/\.{1,2}/", $dir)) {
      $ndir = $base . '\\' . $dir;
      $ndh = opendir($ndir);
      while (($file = readdir($ndh)) !== false) {
        if (preg_match("/.jpg$|.JPG$/", $file) && !preg_match("/^etkag_/", $file)) {
          $size = filesize($ndir . '\\' . $file);
          if ($size > 10000) {
            $nfile = $ndir . "\\" . $file;
            $ofile = $ndir . "\\etkag_" . $file;
            echo $nfile . " ...";
            //$nfile = str_replace("\\","\\\\",$nfile);
            $cmd = "\"$convertprog\" " .
                    //"-text_pos 10 -10 -text_flag bottom-left -text_color 255 255 255 -text_font arial 50 -text \"ETK Elektrotableau Kalbermatter AG\" " .
                    "-o \"$ofile\" " .
                    "-quiet " .
                    "-out jpeg " .
                    "-ratio " .
                    "-resize 600 0 " .
                    "-D " .
                    "\"$nfile\"";
            //echo $cmd."\n";
            $ret = shell_exec($cmd);
            print_r($ret);
            echo ".. done\n";
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