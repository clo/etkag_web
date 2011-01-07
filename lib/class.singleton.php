<?PHP
class singleton {
  function &getInstance ($class){
    static $instances = array();
    if (!array_key_exists($class, $instances)) {
      $instances[$class] = new $class;
    }
    $instance =& $instances[$class];
    return $instance;
  } 
} 
?>