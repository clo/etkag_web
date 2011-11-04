<h3 class="contenttitle">Unser Team</h3>
<div align='content'>
<?PHP
//$pattern="/".$_GET['site']."$/";
//$myDoc = new doc();
//$myDoc->find_dir($g_content,$pattern,$dir);
//unset($myDoc);
$dir = $_SESSION['site'][$_GET['site']];
$myDoc = new doc($dir);
$myDoc->saveContent();
$myDoc->printEditButtonNew($dir, $g_info_file, $_GET['site']);
$info_arr = $myDoc->getInfoText($dir,null,'MULTIPLE');
//$myDoc->dump($info_arr);

if (!empty($info_arr)){
  echo "<table class='topnews' border='0'>";
  foreach($info_arr as $k => $val){
    echo "<tr>";
    echo "<td rowspan='2' valign='top'><a href='".$val['linkzurseite']."' border='0' target='_parent'><img class='etkag' src='".$dir."/".$val['foto']."' border='0' width='150'></a></td>";
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

?>
</div>
