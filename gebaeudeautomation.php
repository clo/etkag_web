<?PHP
include("header.php");
?>
<h3>Automation</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/gebaudeautomation1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/gebaudeautomation2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/gebaudeautomation3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Die technisch hochstehende  Geb�udeautomation kommt auch im
Elektro-Tableaubau zum tragen. Gerade bei umfangreicheren Bauten
ist eine SPS-Steuerung nicht mehr wegzudenken.
Aber auch im gew�hnlichen Wohnungsbau kann mit einer Steuerung
vieles einfacher gesteuert und �berwacht werden.
Wir haben die Erfahrung im Elektro-Tableaubau mit den verschiedensten
SPS- oder EIB-Steuerungen.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Gebaeudeautomation")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Gebaeudeautomation&pos=".$_GET['pos']."' target='_top'>>Referenzen<</a>";
}
?>
<td>
<img src="fotos/gebaudeautomation4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/gebaudeautomation5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/gebaudeautomation6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/gebaudeautomation7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
