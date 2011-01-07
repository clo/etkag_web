<?PHP
include("header.php");
?>
<h3>Organigramm</h3>
<div align='center'>
<table border=0 width='450'>
<tr>
  <td class=orga>
  <?PHP
    echo "<p class=pictext>Frank Kalbermatter:<br>Gesch�ftsf�hrung<br>Kundenbetreuung</p>";
    echo "<a href='index.php?site=cv_frank&pos=".$_GET[pos]."&level=4' target='_top'><img src=".$picture_top['cv_frank']." border=0 width=150></a>"; 
  ?>
  </td>
  <td class=orga>
  <?PHP
    echo "<p class=pictext>Jean Kalbermatter:<br>VR-Pr�sident<br>&nbsp;</p>";
    echo "<a href='index.php?site=cv_jean&pos=".$_GET[pos]."' target='_top'><img src=".$picture_top['cv_jean']." border=0 width=150></a>"; 
  ?>  
  </td>
</tr>
</table>
<table border=0 width='450'>
<tr>
  <td width=150 class=orga>
  <?PHP
    echo "<img src='img/spacer_trans.gif' width=150 height=1>";
    echo "<p class=pictext>Engineering:<br>- Elektrotechnik<br>- Automatiker<br>- Hard- und Software<br><br>Nach Bedarf auf Abruf</p>";
  ?>    
  </td>
  <td width=150 align='center' class=orga>
  <!-- ISO Zertifizierung -->
  <?PHP
    echo "<img src='img/spacer_trans.gif' width	=150 height=1>";
    echo "<p class=pictext><a class=main href='./index.php?site=iso' target='_top'>> ISO-Zertifizierung <</b></p>";
  ?>
  </td>
  <td width=150 class=orga>
  <?PHP
    echo "<p class=pictext>Corinne Kalbermatter:<br>Administration<br>Buchhaltung</p>";
    echo "<a href='index.php?site=cv_corinne&pos=".$_GET[pos]."' target='_top'><img src=".$picture_top['cv_corinne']." border=0 width=150></a>"; 
  ?>  
  
  </td>
</tr>
</table>
<table border=0>
 <tr>
  <td width=110 class=orga>
  <?PHP
    echo "<p class=pictext>Renato D'Andrea:<br>Schaltanlagen Monteur<br>&nbsp;</p>";
    echo "<a href='index.php?site=cv_renato&pos=".$_GET[pos]."' target='_top'><img src=".$picture_top['cv_renato']." border=0 width=110></a>";   
  ?>
  </td>
  <td width=110 class=orga>
  <?PHP
    echo "<p class=pictext>Stephan Zenklusen :<br>Elektopraktiker Monteur</p>";
    echo "<a href='index.php?site=cv_stephan&pos=".$_GET[pos]."' target='_top'><img src=".$picture_top['cv_stephan']." border=0 width=110></a>";   
  ?>  
  </td>
  <td width=110 class=orga>
  <?PHP
    echo "<p class=pictext>Automatiker Praktikant<br>&nbsp;<br>&nbsp;</p>";
    echo /*<a href='index.php?site=cv_' target='_top'>.*/"<img src=".$picture_top['cv_praktikant']." border=0 width=110>";/*</a>"*/   
  ?>  
  </td>
  <td width=110 class=orga>
  <?PHP
    echo "<img src='img/spacer_trans.gif' width	=110 height=1>";
    echo "<p class=pictext>Infrastruktur f�r weiter 2-3 Monteuere:</p>";
  ?>  
  </td>
</tr>
</table>
</div>
<?PHP
include("footer.php");
?>
