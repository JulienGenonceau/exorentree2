<?php

include 'connectdb.php';

echo $_POST['ptitre'].'<br>';
echo $_POST['plien'].'<br>';
echo $_POST['pminiature'].'<br>';
echo $_POST['pcategorie_id'].'<br>';
echo $_POST['pnew_categorie_name'];

$ptitre = $_POST['ptitre'];
$plien = $_POST['plien'];
$pminiature = $_POST['pminiature'];
$pcategorie_id = $_POST['pcategorie_id'];
$pnew_categorie_name = $_POST['pnew_categorie_name'];

//Ajouter potentielle nouvelle catégorie

if (strlen($pnew_categorie_name)>0){
    $sql = "INSERT INTO categorie (categorie_name) VALUES (?)";
    $stmt= $db->prepare($sql);
    $stmt->execute([$pnew_categorie_name]);
    $pcategorie_id = $db->lastInsertId();
}

//Ajouter projet

    $sql = "INSERT INTO projet (projet_name, projet_miniature, projet_link, projet_categorie_id) VALUES (?, ?, ?, ?)";
    $stmt= $db->prepare($sql);
    $stmt->execute([$ptitre, $pminiature, $plien, $pcategorie_id]);

?>