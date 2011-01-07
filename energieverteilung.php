<?PHP
include("header.php");
?>
<h3>Energieverteilungen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/energieverteilung1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/energieverteilung2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/energieverteilung3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td	colspan=2>
Wir bauen Niederspannungsverteilungen bis 700V mit
NH-Sicherungstrennleisten oder NS-Lasttrennschalter
f�r Trafostationen <br>oder f�r sonstige gr�ssere
Verteilungen bis 2500A Nennstrom und 85kA
Kurzschlussstrom.
Auf Wunsch bauen wir auch typgepr�fte Anlagen.<br>
F�r die Kupferbearbeitung sind wir mit unserer
Stanzmaschine und Biegemaschine sehr gut
eingerichtet. Kupferprofile bis zu einem Querschnitt
von  100x10mm k�nnen wir ohne Probleme
bearbeiten.
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Energieverteilung")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Energieverteilung&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>
<img src="fotos/energieverteilung4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/energieverteilung5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/energieverteilung6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/energieverteilung7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
