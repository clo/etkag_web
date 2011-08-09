<?PHP
include("header.php");
?>
<h3>Strassentunnel</h3>
<table class=normal border=0>
<tr>
  <td>
    <img  class='etkag' src="fotos/strassentunnel1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/strassentunnel2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/strassentunnel3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Im Strassentunnelbau ist ein hoher Sicherheitsstandart gefordert, den wir im
Elektroteil bestens kennen. Wir haben Erfahrung f&uuml;r die Herstellung der
Elektrotableaus f&uuml;r Energieverteilung, Beleuchtungssteuerung,
Ventilationssteuerung mit CO und ST Messung und Notausgangsignalisation.
F&uuml;r den Automationsbereich sind wir mit einem Arbeitsplatz eingerichtet und
haben f&uuml;r umfangreichere Auftr&auml;ge gute Beziehungen zu grossen
Automationsfirmen.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Strassentunnel")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Strassentunnel&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img  class='etkag' src="fotos/strassentunnel4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img class='etkag' src="fotos/strassentunnel5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/strassentunnel6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/strassentunnel7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr>
  <td>
    <img class='etkag' src="fotos/strassentunnel8.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/strassentunnel9.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img class='etkag' src="fotos/strassentunnel10.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
