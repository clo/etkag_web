<?PHP
include("header.php");
?>
<h3>Hausverteilungen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img class='etkag' src="fotos/hausverteilung1.jpg" border=0 target='_top'>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/hausverteilung2.jpg" border=0 target='_top'>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/hausverteilung3.jpg" border=0 target='_top'>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
F&uuml;r die Elektroinstallationsgesch&auml;fte fabrizieren wir Hausverteilungen, vom
Hausanschlusskasten bis zum Wohnungsverteiler, von der Hauptverteilung bis zur
Unterverteilung.
Wir liefern alle Elektrotableaus partiell typgepr&uuml;�ft mit Dispositionszeichnungen, NIVProtokoll
 und Bemessugsausf&uuml;hrungskleber.
Spezialanfertigungen und Produktew&uuml;nsche sind f&uuml;r uns kein Problem.  Alle
g&uuml;ngigen Alu-Profile haben wir ab Lager. Rahmenverteilungen k&ouml;nnen wir also auf
Ihre Massangabe ab Lager sehr kurzfristig anfertigen.<br><br>
Die Lehrlinge unserer Elektroinstallationskunden k&ouml;nnen nach Absprache
bei uns eine spezifische Ausbildung f&uuml;r den Elektrotableaubau absolvieren.
Durch die Expertent&auml;tigkeit von Kalbermatter Frank bei den Automatikern
kann eine gute Ausbildungsgrundlage weiter gegeben werden.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Hausverteilung")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Hausverteilung&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
$preisliste = './doc/preislisten/ANGEBOT_AZK_deutsch.pdf';
if(is_file($preisliste)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($preisliste));
  echo "<br>$pic&nbsp;<a class=main href='".$preisliste."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>".$myDoc->formatLinkName(basename($preisliste),true,true)."</a>";
  //echo "<br>";
}
$preisliste = './doc/preislisten/Offre_AZK_francais.pdf';
if(is_file($preisliste)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($preisliste));
  echo "<br>$pic&nbsp;<a class=main href='".$preisliste."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>".$myDoc->formatLinkName(basename($preisliste),true,true)."</a>";
  echo "<br><br>";
}
?>
<td>
<img class='etkag' src="fotos/hausverteilung4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/hausverteilung5.jpg" border=0 target='_top'>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/hausverteilung6.jpg" border=0 target='_top'>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/hausverteilung7.jpg" border=0 target='_top'>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
