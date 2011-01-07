<?
include("./header.php");
?>
<h3>Automation</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/automation1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/automation2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/automation3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
<b>Gebäudeautomation</b><br>
Die Anforderungen an haustechnische Anlagen sind in den letzten Jahren stetig
gestiegen. Die Kundschaft verlangt immer anspruchsvollere Systeme, die
Energie- und Kosteneinsparungen sowie Luxus und Bedienerfreundlichkeit
garantieren. Um diese Ansprüche zu erfüllen, werden Überwachungs- Steuer-
Regel und weitere Einrichtungen im Gebäude gewerbsübergreifend mit einander
vernetzt und automatisiert. Intelligente Gebäudetechnik wird bei den
Investitionskosten oft viel zu hoch eingeschätzt. Ebenfalls wird das Potential
langfristiger Einsparungen nicht berücksichtigt.<br>
Mit Hilfe unserer Spezialisten, welche auf dem Haustechnik Sektor ein breites
Wissen aufgebaut haben, können wir Ihnen alle erwünschten
Automationsvarianten anbieten und Ihnen die Vor- und Nachteile einer solchen
Lösung darlegen. Suchen Sie das Gespräch mit unseren Spezialisten bevor Sie
sich gegen eine intelligente Gebäudetechnik entscheiden!<br><br>
<b>Prozessautomation</b><br>
Durch die andauernd steigenden Unterhalts- sowie Personalkosten
müssen bei fast allen Prozessen Optimierungen eingegliedert
werden. Zeigen Sie uns Ihre Prozessaufgaben und lassen Sie uns
diese in Steuerungs- und MSRL Konzepte übersetzen. Ebenfalls
erstellen wir sämtliche Ausführungsunterlagen und
Elektroschemas.
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Automation")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Automation&pos=".$_GET['post']."' target='_top'>Referenzen</a>";
}
?>
<td>
<img src="fotos/automation4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/automation5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td colspan=2>
    <img src="fotos/automation6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
</tr>
</table>
<?
include("footer.php");
?>