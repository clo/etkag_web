<?PHP
include("header.php");
?>
<h3>Industrie</h3>
<table class=normal border=0>
<tr>
  <td>
    <img class='etkag' src="fotos/industrie1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/industrie2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/industrie3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Wir haben die Erfahrung f&uuml;r verschiedene Elektroanlagen in der Industrie. 
Von der  Energieverteilungen bis zur Elektrosteuerung, vom Steckdosenkasten bis 
zum Bedienkasten. Maschinensteuerungen, Ablaufsteuerungen, besondere Antriebe  
oder  ganze Prozessabl&auml;ufe,  wir k&ouml;nnen die dazu passende Elektrosteuerung 
planen oder anhand Ihrem Schema das passende Elektro-Tableau fabrizieren.<br>
Von der Aufnahme des Pflichtenheftes, Erstellung des Elektroschemas, Produktion 
vom Elektrotableau, Erstellung der SPS Software und Inbetriebnahme vor Ort, 
wir bieten technisch, fach- und zeitgerechte L&ouml;sungen preiswert an. 
F&uuml;r den Service und Unterhalt an Elektroanlagen sind wir im Oberwallis nat&uuml;rlich 
nahe um prompte, preiswerte Hilfe zu leisten.<br>
In der Industrie sind wir stark f&uuml;r die Lonza und die DSM t&auml;tig, wo wir auch 
den gew&uuml;nschten Standart bestens kennen. Aber auch f&uuml;r Maschinenbetriebe, 
Kraftwerke, ARA&apos;s, Regenkl&auml;rbecken, Metzgereien, Bauernh&ouml;fe usw. fabrizieren 
wir Elektro-Tableaus.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Industrie")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Industrie&pos=".$_GET['pos']."' target='_top'>>Referenzen<</a>";
}
?>
<td>
<img class='etkag' src="fotos/industrie4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/industrie5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/industrie6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/industrie7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
