<link rel="stylesheet" href="assets/css/style_gerer_categories.css">
<?php

include '../php/obj_categorie.php';
include '../php/obj_projet.php';
include 'connectdb.php';

$liste_categories = [];
$stmt = $db->query("SELECT * FROM categorie");
while ($row = $stmt->fetch()) {
    $projectList = [];
            $stmt1 = $db->query("SELECT * FROM projet WHERE projet_categorie_id =".$row['categorie_id']);
            while ($row1 = $stmt1->fetch()) {
                $projectList[] = new Projet($row1['projet_name'], $row1['projet_miniature'], $row1['projet_link'], $row1['projet_id'], $row1['projet_categorie_id']);
            }
    $liste_categories[] = new Categorie($row['categorie_name'], $projectList, $row['categorie_id']);
}

    echo '<div class="container">';

    $isFirst = true;
    foreach ($liste_categories as &$categorie) {
        if (!$isFirst){
        echo '<div class="one_categorie_container">';
        echo '<div class="categorie_name_with_pen">';
        echo "<input id='".$categorie->get_categorie_id()."' class='bar_inputname' type='text' value='".$categorie->get_name()."'></input>";
        echo '<div class="bar_inputpen"></div>';
        echo '</div>';
        echo '<div class="bar_deleteicon" id="'.$categorie->get_categorie_id().'"></div>';
        echo '</div>';
        }
        $isFirst = false;
    }
    echo "<input class='input_newcategorie' id='input_newcategorie' type='text' value='' placeholder='AJOUTER UNE CATÉGORIE...'></input>";
    echo "<div class = 'btn' onclick='submitNewCategorie()'> OK </div>";
    echo '</div>';

?>

<script>
    function submitNewCategorie(){
        if (document.getElementById('input_newcategorie').value.length > 0){
            $.post('assets/php/ajouter_categorie_traitement.php', {
            categorie_name: $('#input_newcategorie').val()}, 
        function(returnedData){
            console.log(returnedData);
            include_page('../includes/gerer_categories.php');
        });
    }
    }

    $(".bar_inputpen").on('click', function(event){
        const input =  event.target.parentNode.children[0]
        input.focus();
        var tmpStr = input.value;
        input.value = '';
        input.value = tmpStr;
    });
    $(".bar_inputname").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
        $.post('assets/php/changecategoriename_traitement.php', {
            new_name: e.target.value,
            id: e.target.id}, 
        function(returnedData){
            console.log(returnedData);
            include_page('../includes/gerer_categories.php');
        });
    }
});

$(".input_newcategorie").on('keyup', function (e) {
    if (e.key === 'Enter' || e.keyCode === 13) {
    submitNewCategorie();
    }
});

$(".bar_deleteicon").on('click', function (e) {
    $.post('assets/php/deletecategorie_traitement.php', {
            id: e.target.id}, 
        function(returnedData){
            console.log(returnedData);
            include_page('../includes/gerer_categories.php');
        });
});

</script>