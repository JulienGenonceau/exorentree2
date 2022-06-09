<link rel="stylesheet" href="assets/css/style_gerer_categories.css">
<?php

include '../php/obj_categorie.php';
include '../php/obj_projet.php';


$liste_categories = [
    new Categorie("Categorie 1", [
        new Projet('Projet blablacar', 'default.png', 'www.google.com'),
        new Projet('Projet videos', 'default.png', 'www.google.com'),
        new Projet('Projet super cuite', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    ]),
    new Categorie("Deuxième catégorie", [
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    ]),
    new Categorie("The third one", [
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    ]),
    new Categorie("Q U A T R E", [
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com'),
        new Projet('Projet nom exemple', 'default.png', 'www.google.com')
    ])
    ];

    echo '<div class="container">';
    foreach ($liste_categories as &$categorie) {
        echo '<div class="one_categorie_container">';
        echo '<div class="categorie_name_with_pen">';
        echo "<input class='bar_inputname' type='text' value='".$categorie->get_name()."'></input>";
        echo '<div class="bar_inputpen"></div>';
        echo '</div>';
        echo '<div class="bar_deleteicon"></div>';
        echo '</div>';
    }
    echo "<input class='input_newcategorie' type='text' value='' placeholder='AJOUTER UNE CATÉGORIE...'></input>";
    echo "<div class = 'btn'> OK </div>";
    echo '</div>';


?>