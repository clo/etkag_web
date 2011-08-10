<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class
 *
 * @author tgdloch3
 */
class rss {

  private $_channelStart = "<channel>";
  private $_channelEnd = "</channel>";
  private $_title = "";
  private $_description = "";
  private $_language = "";
  private $_link = "";
  private $_content = "";
  private $_feeds = array();


  function rss() {

  }

  function buildFeed() {
    if (check ()) {

    }
  }

  function check() {
    //TODO: do some basic checks
    return true;
  }

  function addFeed($title,$description,$link,$date){
    $feed = new rssItem($title,$description,$link,$date);
    $this->_feeds = $feed->getItem();
    $test = array();

  }

  public function setTitle($title) {
    $this->_title = $title;
  }

  public function setDescription($description) {
    $this->_description = $description;
  }

  public function setLanguage($language) {
    $this->_language = $language;
  }

  public function setLink($link) {
    $this->_link = $link;
  }

}

?>
