<?php

class Categorie {
    public $name;
    public $liste_de_projets;
  
    function __construct($name, $liste_de_projets) {
      $this->name = $name;
      $this->liste_de_projets = $liste_de_projets;
    }

    function get_name() {
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

  }

?>