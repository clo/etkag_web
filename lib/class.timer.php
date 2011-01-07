<?
class timer {

  private $_starttime;
  private $_stoptime;
  private $_difftime;
  private $_format;

  function timer(){
    $this->_format = "%01.2f";
    $this->_starttime = $this->start();
  }

  function start(){
    $this->_starttime = $this->_getMicroTime();
    return $this->_starttime;
  }

  function stop(){
    $this->_stoptime = $this->_getMicroTime();
    $this->_difftime = $this->_calctime();
    return $this->_difftime;
  }

  private function _calcTime(){
    return $this->_difftime = sprintf($this->_format,$this->_stoptime - $this->_starttime);
  }

  private function _getMicroTime() {
  	list($usec, $sec) = explode(" ", microtime());
  	return ((float)$usec + (float)$sec);
  }
}
?>