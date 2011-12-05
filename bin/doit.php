<?PHP
error_reporting(E_ALL);

/*
 * parameters
 */
$localInstaPath = "Z:\\LOC\\kjoff\\etkag2\\doc\\hauptseite";
$cwd = getcwd();
$filetype = ".jpg$|.tif$|.gif$";
$convertprog = "Z:\\LOC\\Program Files\\xnview\\XnView\\nconvert.exe";
$maxfilesize = 100000; //Bytes 1000000 ~ 1MB
$filesizewidth = 800;

/*
 * main prog
 */
$dh = opendir($cwd);
while (($file = readdir($dh)) !== false) {
  if ($file != '.' && $file != '..') {
    if (preg_match("/$filetype/i", $file)) {
      $size = filesize($cwd . '\\' . $file);
      if ($size > $maxfilesize) {
        $nfile = $cwd . "\\" . $file;
        $ftype = substr($file, strlen($file) - 3, strlen($file));
        $filename = str_replace(".$ftype", "", $file);
        $ofile = $cwd . "\\" . $filename . "_" . "." . $ftype;
        if (!preg_match("/.*_$/", $filename) || preg_match("/\/logo$|schaltanlagen$/", $ndir)) {
          echo $nfile . " ...";
            //$nfile = str_replace("\\","\\\\",$nfile);
            $cmd = "\"$convertprog\" " .
                    //"-text_pos 10 -10 -text_flag bottom-left -text_color 255 255 255 -text_font arial 50 -text \"ETK Elektrotableau Kalbermatter AG\" " .
                    "-o \"$ofile\" " .
                    "-quiet " .
                    "-out jpeg " .
                    "-q 50  " .
                    "-ratio " .
                    "-resize $filesizewidth 0 " .
                    "-D " .
                    "\"$nfile\"";
            //echo $cmd . "\n";
            $error = shell_exec($cmd);
            if ($error == "") {
              echo ".. verkleinert\n";
            } else {
              echo ".. Problem beim Verkleinern [ERROR: $error]\n";
            }
          }
        }
    }
  }
}
closedir($dh);
//exit($exit);
?>