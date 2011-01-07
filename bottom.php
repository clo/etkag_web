<?PHP
$myMod = new lastmod();
$myMod->chkLastMod("./");
$bottom = str_replace("###LASTMOD###",$myMod->getLastMod(),$bottom);
?>
<p class=bottom><?PHP echo $bottom; ?></p>
