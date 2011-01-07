<?PHP
class menu {
	var $menu = array();
	var $css = array();
	var $pos = 100;
	var $pos_click = 0;
	var $pos_actual = 0;
	var $pos_before = 0;
	var $level_depth = 2;
	var $color;
	var $level;
	
	function setMenu($m){
		$this->menu = $m;
	}
	
	function setCSS($css){
		$this->css = $css;
	}
	
	function printMenu($menu_arr){
		if(empty($menu_arr)){
			$menu_arr = $this->menu;
		}
		if (!empty($menu_arr)){
		  foreach ($menu_arr as $nr => $val){
			  $this->pos_actual = $nr;
			
		  	  $level = $this->getLevel($this->pos_actual);
			  $len = $this->level * $this->level_depth;
			  //todo
			  //echo $len;
			  if (($level==1 ||
			    substr($this->pos_actual,0,	2) == substr($this->pos_click,0,2)) && 
			    $this->getVal($this->menu[$this->pos_actual],2)) {
                
                $class = "class='m".$level."'";
                if ($this->pos_actual == $this->pos_click){
                  $bold_start = "<b>";
                  $bold_end = "</b>";
                }else{
                  $bold_start = "";
                  $bold_end = "";
                }
                echo "<tr><td $class>$bold_start<a $class href='".$this->getVal($menu_arr[$this->pos_actual],1)."&pos=$this->pos_actual&level=$this->level'>".$this->getVal($menu_arr[$this->pos_actual],0)."</a>$bold_end";
                echo "</td></tr>\n";
			  }
			  $this->pos_before = $nr;	
		  }
		}
	}
	
	function getLevel($pos){
		if (substr($pos,$this->level_depth,2*$this->level_depth) == '0000'){
		  $level = 1;
		}elseif(substr($pos,$this->level_depth*2,$this->level_depth) == '00'){
		  $level = 2;
		}else{
		  $level = 3;
		}
		return $level;
	}
	
	function getVal($str,$i){
		$arr = split(";",$str);
		return $arr[$i];
	}
}

/*include('../lib/menu.cfg.php');
include('../cfg/config.inc.php');
$myMenu = new menu();
$myMenu->setMenu($menutree);
$myMenu->setCSS($menu_class);
$level = 0;
echo "<table>";
$myMenu->printMenu(null,$level);	
echo "</table>";
*/
?>