<?PHP
include("header.php");
?>

<h3>Elekropraktiker</h3>

<div align='left'>
<table border=0 class=cv>
<tr><td width=150 class=cvtitle>Name:</td><td width=200>Zenklusen</td></tr>
<tr><td width=150 class=cvtitle>Vorname:</td><td width=200>Stephan</td></tr>
<tr><td width=150 class=cvtitle>Geburtstag:</td><td width=200>05.02.1984</td></tr>
<tr><td width=150 class=cvtitle>Zivilstand:</td><td width=200>Ledig</td></tr>
<tr><td width=150 class=cvtitle>Kinder:</td><td width=200>Laura</td></tr>
<tr><td width=150 class=cvtitle>Ausbildung:</td><td width=200>Elektropraktiker</td></tr>
<tr><td width=150 class=cvtitle>Arbeitsbeginn:</td><td width=200>seit 2004</td></tr>
<!--<tr><td width=150 class=cvtitle>AHV-Nr.:</td><td width=200>983.84.136.117</td></tr>-->
<tr><td width=150 class=cvtitle>Telefon:</td><td width=200>027 923 23 78</td></tr>
<tr><td width=150 class=cvtitle>Mobil:</td><td width=200>078 659 08 58</td></tr>
<tr><td width=150 class=cvtitle>Email:</td><td width=200><a class=main href='mailto:info@etkag.ch'>info@etkag</a></td></tr>
</table>
</div>
<p>
<?PHP
$myDoc = new doc();
$cv = "./doc/cv/Lebenslauf_Zenklusen_Stephan.pdf";
if (is_file($cv)){
  $pic = $myDoc->getFileTypeSymbol($myDoc->getFileType($cv));
  echo "$pic&nbsp;<a class=main href='".$cv."' onClick=\"javascript:window.open(this.href,'_new','menubar=no, width=800, height=600, resizable=yes');return false;\" target='_new'>Lebenslauf</a>";
}
?>
</p>
<?PHP
include("footer.php");
?>
