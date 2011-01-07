<?PHP
include("header.php");
?>
<h3>Praktikant</h3>

<div align='left'>
<table border=0 class=cv>
<tr><td width=150 class=cvtitle>Name:</td><td width=200>Ruppen</td></tr>
<tr><td width=150 class=cvtitle>Vorname:</td><td width=200>Christian</td></tr>
<tr><td width=150 class=cvtitle>Geburtstag:</td><td width=200>05.05.1986</td></tr>
<tr><td width=150 class=cvtitle>Zivilstand:</td><td width=200>ledig</td></tr>
<tr><td width=150 class=cvtitle>Kinder:</td><td width=200>keine</td></tr>
<!--<tr><td width=150 class=cvtitle>Ausbildung:</td><td width=200>Kaufm�nnische Angestellte</td></tr>-->
<!--<tr><td width=150 class=cvtitle>Arbeitsbeginn:</td><td width=200>19.07.2005</td></tr>-->
<!--<tr><td width=150 class=cvtitle>AHV-Nr.:</td><td width=200>527.78.526.115</td></tr>-->
<tr><td width=150 class=cvtitle>Telefon:</td><td width=200>027 923 23 78</td></tr>
<tr><td width=150 class=cvtitle>Mobil:</td><td width=200>078 773 19 37</td></tr>
<tr><td width=150 class=cvtitle>Email:</td><td width=200><a class=main href='mailto:info@etkag.ch'>info@etkag</a></td></tr>
</table>
</div>
<p>
<?PHP
$myDoc = new doc();
$cv = "./doc/cv/Lebenslauf_Christian_Ruppen.pdf";
if (is_file($cv)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($cv));
  echo "$pic&nbsp;<a class=main href='".$cv."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Lebenslauf</a>";
}
?>
</p>
<?PHP
include("footer.php");
?>
