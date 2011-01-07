<?
include("header.php");
?>
<h3>Elektrobrennstempel</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/brennstempel1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/brennstempel2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/brennstempel3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=3>
Der elektrische Brennstempel eignet sich zur Reklame oder
Eigentumsbezeichnung auf Holz, Kunststoff und Leder. Er ist in
wenigen Minuten betriebsbereit und ermöglicht Ihnen fortlaufendes,
zeitsparendes Brennen ohne Unterbruch.
Der Brennstempel muss ca.5-10Min. an eine 230V Steckdose
angeschlossen werden und ist dann für fortlaufendes Brennen
bereit. Der Brennstempel hat kein Thermostat und muss deshalb
sobald das Brennen beendigt ist, dringend  vom Netzanschluss
getrennt werden.<br><br>
<b>Ausführung</b><br>
<li>Stempel mit verschieden grossen Brennflächen
<li>VSM Normschrift 1reihig
<li>VSM Normschrift mehrzeilig gegen Mehrpreis
<li>Spezielle Schriftzüge oder Signete gegen Mehrpreis
<li>Mehrere Schriftgrössen möglich (Seitencliche)
<li>Anfertigung mit auswechselbaren Zahlen / Buchstaben
<li>Ausführung für in Bohrfutter
<br><br>
<?
$myDoc = new doc();
$preisliste = './doc/preislisten/Brennstempel.pdf';
if(is_file($preisliste)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($preisliste));
  echo "$pic&nbsp;<a class=main href='".$preisliste."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Preisliste</a>";
  echo "<br><br>";
}
?>
<?

if ($myDoc->docAvailable("./doc/referenzen/Elektrobrennstempel")) {
  echo "<a class=main href='index.php?site=referenzen&dir=elektrobrennstempel&pos=$pos' target='_top'>> Referenzen <</a>";
}
?>
<!--<td>
<img src="fotos/brennstempel4.jpg" border=0>
</td>-->
</td></tr>
<tr>
  <td>
    <?
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel4.jpg"); 
	?>
    <img src="fotos/brennstempel4.jpg" border=0><? echo $imgsrc; ?>
    <div class=pictext_left>Stempel mit Seitencliche<br>&nbsp;</div>
  </td>
  <td>
    <?
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel5.jpg"); 
	?>
    <img src="fotos/brennstempel5.jpg" border=0><? echo $imgsrc; ?>
   <div class=pictext_left>Schwalbenschwanz,<br>auswechselbar</div>
  </td>
  <td>
    <?
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel6.jpg"); 
	?>
    <img src="fotos/brennstempel6.jpg" border=0><? echo $imgsrc; ?>
    <div class=pictext_left>Spezialschriften<br>&nbsp;</div> 
  </td>
</tr>
</table>
<?
include("footer.php");
?>
