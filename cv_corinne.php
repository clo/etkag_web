<?
include("header.php");
?>
<h3>Administration</h3>

<div align='left'>
<table border=0 class=cv>
<tr><td width=150 class=cvtitle>Name:</td><td width=200>Kalbermatter</td></tr>
<tr><td width=150 class=cvtitle>Vorname:</td><td width=200>Corinne</td></tr>
<tr><td width=150 class=cvtitle>Geburtstag:</td><td width=200>26.01.1978</td></tr>
<tr><td width=150 class=cvtitle>Zivilstand:</td><td width=200>verheiratet</td></tr>
<tr><td width=150 class=cvtitle>Kinder:</td><td width=200>keine</td></tr>
<tr><td width=150 class=cvtitle>Ausbildung:</td><td width=200>Kaufmännische Angestellte</td></tr>
<tr><td width=150 class=cvtitle>Arbeitsbeginn:</td><td width=200>19.07.2005</td></tr>
<!--<tr><td width=150 class=cvtitle>AHV-Nr.:</td><td width=200>527.78.526.115</td></tr>-->
<tr><td width=150 class=cvtitle>Telefon:</td><td width=200>027 923 23 78</td></tr>
<tr><td width=150 class=cvtitle>Mobil:</td><td width=200>079 774 41 66</td></tr>
<tr><td width=150 class=cvtitle>Email:</td><td width=200><a class=main href='mailto:info@etkag.ch'>info@etkag</a></td></tr>
</table>
</div>
<p>
<?
$myDoc = new doc();
$cv = "./doc/cv/Lebenslauf_Kalbermatter_Corinne.pdf";
if (is_file($cv)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($cv));
  echo "$pic&nbsp;<a class=main href='".$cv."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Lebenslauf</a>";
}
?>
</p>
<?
include("footer.php");
?>