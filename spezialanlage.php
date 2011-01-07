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
Mit unserer Infrastruktur im Elektrotableaubau und langjähriger
Erfahrung können wir für verschiedenste Anwendungen eine Lösung
finden. Wir gehen auf spezielle, individuelle Wünsche ein und sind offen
für jede weitere Tätigkeit.<br><br>
Einige Beispiele für diverse Spezialanlagen :
<li>Edelstahlkästen
<li>Baustellenstromverteiler
<li>Campingverteilkästen
<li>Prüftableau
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
