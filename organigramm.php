<?PHP
include("header.php");
?>
<h3>Organigramm</h3>
<div align='left'>
<?PHP
$dir="doc/organigramm";
$myDoc = new doc($dir);
$info_arr = $myDoc->getInfoText($dir,null,'MULTIPLE');
//$myDoc->dump($info_arr);

if (!empty($info_arr)){
  echo "<table class='topnews' border='0'>";
  foreach($info_arr as $k => $val){
    echo "<tr>";
    echo "<td rowspan='2' valign='top'><a href='".$val['linkzurseite']."' border='0' target='_parent'><img src='".$dir."/".$val['foto']."' border='0' width='150'></a></td>";
    echo "<td align='left' valign='top' nowrap>";
    foreach($val as $key => $v){
      if (!preg_match("/id|foto|lebenslauf|linkzurseite|ausbildungsprogramm|^detail_/",$key)) {
        echo $v."<br>\n";
  	  }
  	}
  	$pic = $myDoc->getFileTypeSymbol('pdf');
  	if(!empty($val['ausbildungsprogramm']) && is_file($val['ausbildungsprogramm'])){
  	  echo "$pic&nbsp;<a class='main' href='".$val['ausbildungsprogramm']."' target='_new'>Ausbildungsprogramm</a><br>";
  	}
  	if (!empty($val['lebenslauf']) && is_file($val['lebenslauf'])){
  	  echo "$pic&nbsp;<a class='main' href='".$val['lebenslauf']."' target='_new'>Lebenslauf</a><br>";
  	}
  	echo "<tr><td><a class='main' href='".$val['linkzurseite']."' target='_parent'>>mehr<</a></td></tr>";
  	echo "</td>";
  	echo "<tr>";
  }
  echo "</table>";
}
include("footer.php");
?>
