<?php

include 'connectdb.php';
$id_projet = $_POST['id_projet'];
$id_categorie = $_POST['id_categorie']; 

$sql = "UPDATE projet SET projet_categorie_id=? WHERE projet_id=".$id_projet;
$stmt= $db->prepare($sql);
$stmt->execute([$id_categorie]);

?>