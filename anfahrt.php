<?PHP

include("header.php");
$myDoc = new doc();
$myDoc->getContentFromInfoFile($_GET['site']);
//$myDoc->find_dir($g_content, "\/$pattern$/", $dir);
$dir = $_SESSION['site'][$_GET['site']];
$myDoc->path = $dir;
unset($myDoc);
include("footer.php");
?>

<!--h3 class='contenttitle'>Anfahrt</h3>
<span class="content">
ETK AG befindet sich in der Furkastrasse 116 in 3904 Naters.
<iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.de/maps?f=q&amp;source=s_q&amp;hl=de&amp;geocode=&amp;q=ETK+Elektro+Tableau+Kalbermatter+AG,+Furkastrasse,+Naters,+Schweiz&amp;aq=0&amp;sll=46.326676,8.008089&amp;sspn=0.012002,0.01929&amp;g=naters+furkastrasse+116&amp;ie=UTF8&amp;hq=ETK+Elektro+Tableau+Kalbermatter+AG,&amp;hnear=Furkastrasse,+3904+Naters,+Brig,+Wallis,+Schweiz&amp;t=h&amp;cid=8125085954693393867&amp;ll=46.331817,8.00869&amp;spn=0.028447,0.054932&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="http://maps.google.de/maps?f=q&amp;source=embed&amp;hl=de&amp;geocode=&amp;q=ETK+Elektro+Tableau+Kalbermatter+AG,+Furkastrasse,+Naters,+Schweiz&amp;aq=0&amp;sll=46.326676,8.008089&amp;sspn=0.012002,0.01929&amp;g=naters+furkastrasse+116&amp;ie=UTF8&amp;hq=ETK+Elektro+Tableau+Kalbermatter+AG,&amp;hnear=Furkastrasse,+3904+Naters,+Brig,+Wallis,+Schweiz&amp;t=h&amp;cid=8125085954693393867&amp;ll=46.331817,8.00869&amp;spn=0.028447,0.054932&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Größere Kartenansicht</a></small>
</span-->

