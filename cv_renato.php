<?
include("header.php");
?>
<h3>Schaltanlagen Monteur</h3>

<div align='left'>
<table border=0 class=cv>
<tr><td width=150 class=cvtitle>Name:</td><td width=200>D'Andrea</td></tr>
<tr><td width=150 class=cvtitle>Vorname:</td><td width=200>Renato</td></tr>
<tr><td width=150 class=cvtitle>Geburtstag:</td><td width=200>12.05.1974</td></tr>
<tr><td width=150 class=cvtitle>Zivilstand:</td><td width=200>verheiratet</td></tr>
<tr><td width=150 class=cvtitle>Kinder:</td><td width=200>keine</td></tr>
<tr><td width=150 class=cvtitle>Ausbildung:</td><td width=200>Schaltanlagenmonteur</td></tr>
<tr><td width=150 class=cvtitle>Arbeitsbeginn:</td><td width=200>11.03.2002</td></tr>
<!--<tr><td width=150 class=cvtitle>AHV-Nr.:</td><td width=200>276.74.243.184</td></tr>-->
<tr><td width=150 class=cvtitle>Telefon:</td><td width=200>027 923 23 78</td></tr>
<tr><td width=150 class=cvtitle>Mobil:</td><td width=200>0039 347 32 23 803</td></tr>
<tr><td width=150 class=cvtitle>Email:</td><td width=200><a class=main href='mailto:info@etkag.ch'>info@etkag</a></td></tr>
</table>
</div>
<p>
<?
$myDoc = new doc();
$cv = "./doc/cv/Lebenslauf_DAndrea_Renato.pdf";
if (is_file($cv)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($cv));
  echo "$pic&nbsp;<a class=main href='".$cv."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Lebenslauf</a>";
}
?>
</p>
<?
include("footer.php");
?>
