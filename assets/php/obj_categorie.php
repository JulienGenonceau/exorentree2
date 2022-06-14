<?php

class Categorie {
    public $name;
    public $liste_de_projets;
    public $id;
  
    function __construct($name, $liste_de_projets, $id) {
      $this->name = $name;
      $this->liste_de_projets = $liste_de_projets;
      $this->id = $id;
    }

    function get_name() {
        str_replace('"', "", $this->name);
        str_replace("'", "", $this->name);
        return $this->name;
    }

    function get_liste_de_projet() {
        return $this->liste_de_projets;
    }

    function get_project_by_id($id){
        return $this->liste_de_projets[$id];
    }

    function get_categorie_size(){
        return count($this->liste_de_projets);
    }

    function get_categorie_id(){
        return $this->id;
    }

  }

?>