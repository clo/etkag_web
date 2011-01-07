<?PHP
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
<b>Geb�udeautomation</b><br>
Die Anforderungen an haustechnische Anlagen sind in den letzten Jahren stetig
gestiegen. Die Kundschaft verlangt immer anspruchsvollere Systeme, die
Energie- und Kosteneinsparungen sowie Luxus und Bedienerfreundlichkeit
garantieren. Um diese Anspr�che zu erf�llen, werden �berwachungs- Steuer-
Regel und weitere Einrichtungen im Geb�ude gewerbs�bergreifend mit einander
vernetzt und automatisiert. Intelligente Geb�udetechnik wird bei den
Investitionskosten oft viel zu hoch eingesch�tzt. Ebenfalls wird das Potential
langfristiger Einsparungen nicht ber�cksichtigt.<br>
Mit Hilfe unserer Spezialisten, welche auf dem Haustechnik Sektor ein breites
Wissen aufgebaut haben, k�nnen wir Ihnen alle erw�nschten
Automationsvarianten anbieten und Ihnen die Vor- und Nachteile einer solchen
L�sung darlegen. Suchen Sie das Gespr�ch mit unseren Spezialisten bevor Sie
sich gegen eine intelligente Geb�udetechnik entscheiden!<br><br>
<b>Prozessautomation</b><br>
Durch die andauernd steigenden Unterhalts- sowie Personalkosten
m�ssen bei fast allen Prozessen Optimierungen eingegliedert
werden. Zeigen Sie uns Ihre Prozessaufgaben und lassen Sie uns
diese in Steuerungs- und MSRL Konzepte �bersetzen. Ebenfalls
erstellen wir s�mtliche Ausf�hrungsunterlagen und
Elektroschemas.
<br><br>
<?PHP
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
<?PHP
include("footer.php");
?>