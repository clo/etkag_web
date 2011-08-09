<?PHP
include("header.php");
?>
<h3>Spezialanlagen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img  class='etkag' src="fotos/spezialanlage1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/spezialanlage2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/spezialanlage3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Mit unserer Infrastruktur im Elektrotableaubau und langj&auml;hriger
Erfahrung k&ouml;nnen wir f&uuml;r verschiedenste Anwendungen eine L&ouml;sung
finden. Wir gehen auf spezielle, individuelle W&uuml;nsche ein und sind offen
f&uuml;r jede weitere T&auml;tigkeit.<br><br>
Einige Beispiele f&uuml;r diverse Spezialanlagen :
<li>Edelstahlk&auml;sten
<li>Baustellenstromverteiler
<li>Campingverteilk&auml;sten
<li>Pr&uuml;ftableau
<li>Schalterplatinen
<li>Steuerschrank Pneumatik
<li>Gasmischkasten
<li>USV, Kompensation, Netzfilter
<br><br>
<?PHP
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Spezialanlagen")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Spezialanlagen&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>

<img  class='etkag' src="fotos/spezialanlage4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img  class='etkag' src="fotos/spezialanlage5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/spezialanlage6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img  class='etkag' src="fotos/spezialanlage7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?PHP
include("footer.php");
?>
