<link rel="stylesheet" href="assets/css/style_gerer_projets.css">

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

        foreach ($liste_categories as &$categorie) {
            echo '<p class="categorie_name">'.$categorie->get_name().'</p>';

            echo '<div class="projets_grid">';
            foreach ($categorie->get_liste_de_projet() as &$projet) {
            echo '<div class="projets_item" href="'.$projet->get_link().'">'
            .
            "<img src=assets/img/".$projet->get_miniature()."></img>"
            .
            "<div class='item_modifbar'>   
                   <input class='bar_inputname' type='text' value='".$projet->get_name()."'></input>
                   <div class='bar_icon one'></div>
                   <div class='bar_icon two'></div>
                   <div class='bar_icon trois'></div>

                   <select class='select_modifbar' name='cars' id='cars'>
                   <option value='volvo'>Volvo</option>
                   <option value='saab'>Saab</option>
                   <option value='mercedes'>Mercedes</option>
                   <option value='audi'>Audi</option>
                   </select>
                   
            </div>"
            .
            "<div class='item_redcross'>X</div>"
            .
            '<p>'.$projet->get_name().'</p>'
            .
            '</div>';
            }
            echo '</div>';
        }

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>