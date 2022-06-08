<?php
class Projet {
    public $name;
    public $miniature;
    public $link;
  
    function __construct($name, $miniature, $link) {
      $this->name = $name;
      $this->miniature = $miniature;
      $this->link = $link;
    }

    function get_name() {
        return $this->name;
    }

    function get_miniature() {
        return $this->miniature;
    }

    function get_link() {
        return $this->link;
    }
  }
  
//   $apple = new Fruit("Apple");
//   echo $apple->get_name();
?>