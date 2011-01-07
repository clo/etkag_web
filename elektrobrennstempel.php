<?PHP
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
wenigen Minuten betriebsbereit und erm�glicht Ihnen fortlaufendes,
zeitsparendes Brennen ohne Unterbruch.
Der Brennstempel muss ca.5-10Min. an eine 230V Steckdose
angeschlossen werden und ist dann f�r fortlaufendes Brennen
bereit. Der Brennstempel hat kein Thermostat und muss deshalb
sobald das Brennen beendigt ist, dringend  vom Netzanschluss
getrennt werden.<br><br>
<b>Ausf�hrung</b><br>
<li>Stempel mit verschieden grossen Brennfl�chen
<li>VSM Normschrift 1reihig
<li>VSM Normschrift mehrzeilig gegen Mehrpreis
<li>Spezielle Schriftz�ge oder Signete gegen Mehrpreis
<li>Mehrere Schriftgr�ssen m�glich (Seitencliche)
<li>Anfertigung mit auswechselbaren Zahlen / Buchstaben
<li>Ausf�hrung f�r in Bohrfutter
<br><br>
<?PHP
$myDoc = new doc();
$preisliste = './doc/preislisten/Brennstempel.pdf';
if(is_file($preisliste)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($preisliste));
  echo "$pic&nbsp;<a class=main href='".$preisliste."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Preisliste</a>";
  echo "<br><br>";
}
?>
<?PHP

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
    <?PHP
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel4.jpg"); 
	?>
    <img src="fotos/brennstempel4.jpg" border=0><?PHP echo $imgsrc; ?>
    <div class=pictext_left>Stempel mit Seitencliche<br>&nbsp;</div>
  </td>
  <td>
    <?PHP
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel5.jpg"); 
	?>
    <img src="fotos/brennstempel5.jpg" border=0><?PHP echo $imgsrc; ?>
   <div class=pictext_left>Schwalbenschwanz,<br>auswechselbar</div>
  </td>
  <td>
    <?PHP
      $imgsrc = $myDoc->getPictureSrc("fotos/gross/brennstempel6.jpg"); 
	?>
    <img src="fotos/brennstempel6.jpg" border=0><?PHP echo $imgsrc; ?>
    <div class=pictext_left>Spezialschriften<br>&nbsp;</div> 
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
