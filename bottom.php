<div class="bottom">
<?PHP
if ($g_debug){
  $start = microtime();
}
if (!isset($_SESSION['lastmod'])){
  $myMod = new lastmod();
  $myMod->chkLastMod($g_content);
  $_SESSION['lastmod'] = $myMod->getLastMod();
}
$bottom = str_replace("###LASTMOD###",$_SESSION['lastmod'],$bottom);
?>
<?PHP echo $bottom;
if ($g_debug){
  $end = microtime();
  $diff = $end - $start;
  echo "TIMETORUN for bottom: ".$diff."<br />";
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";
}

?>
</div>
