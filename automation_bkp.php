<?PHP
include("./header.php");
?>
<h3>Automation</h3>
<table class=normal border=0>
<tr>
  <td>
    <img class='etkag' src="fotos/automation1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/automation2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/automation3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
<b>Geb&auml;udeautomation</b><br>
Die Anforderungen an haustechnische Anlagen sind in den letzten Jahren stetig
gestiegen. Die Kundschaft verlangt immer anspruchsvollere Systeme, die
Energie- und Kosteneinsparungen sowie Luxus und Bedienerfreundlichkeit
garantieren. Um diese Anspr&uuml;che zu erf&uuml;llen, werden &Uumlberwachungs- Steuer-
Regel und weitere Einrichtungen im Geb&auml;ude gewerbs&uuml;bergreifend mit einander
vernetzt und automatisiert. Intelligente Geb&auml;udetechnik wird bei den
Investitionskosten oft viel zu hoch eingesch&auml;tzt. Ebenfalls wird das Potential
langfristiger Einsparungen nicht ber&uuml;cksichtigt.<br>
Mit Hilfe unserer Spezialisten, welche auf dem Haustechnik Sektor ein breites
Wissen aufgebaut haben, k&ouml;nnen wir Ihnen alle erw&uuml;nschten
Automationsvarianten anbieten und Ihnen die Vor- und Nachteile einer solchen
L&ouml;sung darlegen. Suchen Sie das Gespr&auml;ch mit unseren Spezialisten bevor Sie
sich gegen eine intelligente Geb&auml;udetechnik entscheiden!<br><br>
<b>Prozessautomation</b><br>
Durch die andauernd steigenden Unterhalts- sowie Personalkosten
m&uuml;ssen bei fast allen Prozessen Optimierungen eingegliedert
werden. Zeigen Sie uns Ihre Prozessaufgaben und lassen Sie uns
diese in Steuerungs- und MSRL Konzepte &uuml;bersetzen. Ebenfalls
erstellen wir s&auml;mtliche Ausf&uuml;hrungsunterlagen und
Elektroschemas.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Automation")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Automation&pos=".$_GET['post']."' target='_top'>Referenzen</a>";
}
?>
<td>
<img class='etkag' src="fotos/automation4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/automation5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td colspan=2>
    <img class='etkag' src="fotos/automation6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>