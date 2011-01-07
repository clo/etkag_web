<?
include("header.php");
?>
<h3>Industrie</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/industrie1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/industrie2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/industrie3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Wir haben die Erfahrung für verschiedene Elektroanlagen in der Industrie. 
Von der  Energieverteilungen bis zur Elektrosteuerung, vom Steckdosenkasten bis 
zum Bedienkasten. Maschinensteuerungen, Ablaufsteuerungen, besondere Antriebe  
oder  ganze Prozessabläufe,  wir können die dazu passende Elektrosteuerung 
planen oder anhand Ihrem Schema das passende Elektro-Tableau fabrizieren.<br>
Von der Aufnahme des Pflichtenheftes, Erstellung des Elektroschemas, Produktion 
vom Elektrotableau, Erstellung der SPS Software und Inbetriebnahme vor Ort, 
wir bieten technisch, fach- und zeitgerechte Lösungen preiswert an. 
Für den Service und Unterhalt an Elektroanlagen sind wir im Oberwallis natürlich 
nahe um prompte, preiswerte Hilfe zu leisten.<br>
In der Industrie sind wir stark für die Lonza und die DSM tätig, wo wir auch 
den gewünschten Standart bestens kennen. Aber auch für Maschinenbetriebe, 
Kraftwerke, ARA’s, Regenklärbecken, Metzgereien, Bauernhöfe usw. fabrizieren 
wir Elektro-Tableaus.
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Industrie")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Industrie&pos=".$_GET['pos']."' target='_top'>>Referenzen<</a>";
}
?>
<td>
<img src="fotos/industrie4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/industrie5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/industrie6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/industrie7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>
