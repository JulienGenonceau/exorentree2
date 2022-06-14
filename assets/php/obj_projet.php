<?php
class Projet {
    public $name;
    public $miniature;
    public $link;
    public $id;
    public $categorie_id;
  
    function __construct($name, $miniature, $link, $id, $categorie_id) {
      $this->name = $name;
      $this->miniature = $miniature;
      $this->link = $link;
      $this->id = $id;
      $this->categorie_id = $categorie_id;
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

    function get_id() {
      return $this->id;
    }

    function get_categorie_id() {
      return $this->categorie_id;
    }
    
  }
?>