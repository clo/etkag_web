<?
include("header.php");
?>
<h3>Strassentunnel</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/strassentunnel1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Im Strassentunnelbau ist ein hoher Sicherheitsstandart gefordert, den wir im
Elektroteil bestens kennen. Wir haben Erfahrung für die Herstellung der
Elektrotableaus für Energieverteilung, Beleuchtungssteuerung,
Ventilationssteuerung mit CO und ST Messung und Notausgangsignalisation.
Für den Automationsbereich sind wir mit einem Arbeitsplatz eingerichtet und
haben für umfangreichere Aufträge gute Beziehungen zu grossen
Automationsfirmen.
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Strassentunnel")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Strassentunnel&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img src="fotos/strassentunnel4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/strassentunnel5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr>
  <td>
    <img src="fotos/strassentunnel8.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel9.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/strassentunnel10.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>
