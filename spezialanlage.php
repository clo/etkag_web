<?
include("header.php");
?>
<h3>Spezialanlagen</h3>
<table class=normal border=0>
<tr>
  <td>
    <img src="fotos/spezialanlage1.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/spezialanlage2.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/spezialanlage3.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
<tr><td colspan=2>
Mit unserer Infrastruktur im Elektrotableaubau und langj�hriger
Erfahrung k�nnen wir f�r verschiedenste Anwendungen eine L�sung
finden. Wir gehen auf spezielle, individuelle W�nsche ein und sind offen
f�r jede weitere T�tigkeit.<br><br>
Einige Beispiele f�r diverse Spezialanlagen :
<li>Edelstahlk�sten
<li>Baustellenstromverteiler
<li>Campingverteilk�sten
<li>Pr�ftableau
<li>Schalterplatinen
<li>Steuerschrank Pneumatik
<li>Gasmischkasten
<li>USV, Kompensation, Netzfilter
<br><br>
<?
$myDoc = new doc();
if ($myDoc->docAvailable("./doc/referenzen/Spezialanlagen")) {
  echo "<a class=main href='index.php?site=referenzen&dir=Spezialanlagen&pos=".$_GET['pos']."' target='_top'>> Referenzen <</a>";
}
?>
<td>

<img src="fotos/spezialanlage4.jpg" border=0>
</td>
</td></tr>
<tr>
  <td>
    <img src="fotos/spezialanlage5.jpg" border=0>
    <!--<div class=pictext_left>Gesamtwerkstatt</div>-->
  </td>
  <td>
    <img src="fotos/spezialanlage6.jpg" border=0>
   <!--<div class=pictext_left>Profilbearbeitung</div>-->
  </td>
  <td>
    <img src="fotos/spezialanlage7.jpg" border=0>
    <!--<div class=pictext_left>Brennstempelwerkstatt</div>-->  
  </td>
</tr>
</table>
<?
include("footer.php");
?>