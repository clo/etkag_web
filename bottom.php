<div class="bottom">
<?PHP
$myMod = new lastmod();
$myMod->chkLastMod($g_content);
$bottom = str_replace("###LASTMOD###",$myMod->getLastMod(),$bottom);
?>
<?PHP echo $bottom; ?>
</div>
