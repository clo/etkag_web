<?PHP
include("header.php");
?>
<h3>Gesch�ftsf�hrer</h3>

<div align='left'>
<table border=0 class=cv>
<tr><td width=150 class=cvtitle>Name:</td><td width=150>Kalbermatter</td></tr>
<tr><td width=150 class=cvtitle>Vorname:</td><td width=150>Frank</td></tr>
<tr><td width=150 class=cvtitle>Geburtstag:</td><td width=150>30.11.1970</td></tr>
<tr><td width=150 class=cvtitle>Zivilstand:</td><td width=150>verheiratet</td></tr>
<tr><td width=150 class=cvtitle>Kinder:</td><td width=150>keine</td></tr>
<tr><td width=150 class=cvtitle>Ausbildung:</td><td width=150>Schaltanlagenmonteur</td></tr>
<tr><td width=150 class=cvtitle>Arbeitsbeginn:</td><td width=150>15.07.1986</td></tr>
<!--<tr><td width=150 class=cvtitle>AHV-Nr.:</td><td width=150>527.70.461.111</td></tr>-->
<tr><td width=150 class=cvtitle>Telefon:</td><td width=150>027 923 23 78</td></tr>
<tr><td width=150 class=cvtitle>Mobil:</td><td width=150>079 285 70 09</td></tr>
<tr><td width=150 class=cvtitle>Email:</td><td width=150><a class=main href='mailto:info@etkag.ch'>info@etkag</a></td></tr>
</table>
</div>
<p>
<?PHP
$myDoc = new doc();
$cv = "./doc/cv/Lebenslauf_Kalbermatter_Frank.pdf";
if (is_file($cv)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($cv));
  echo "$pic&nbsp;<a class=main href='".$cv."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Lebenslauf</a>";
}
?>
</p>
<?PHP
include("footer.php");
?>