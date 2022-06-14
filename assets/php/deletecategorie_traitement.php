<?php

include 'connectdb.php';

$id = $_POST['id'];

$sql = "UPDATE projet SET projet_categorie_id=? WHERE projet_categorie_id=".$id;
$stmt= $db->prepare($sql);
$stmt->execute(['3']);

$sql = "DELETE FROM categorie WHERE categorie_id=?";
$stmt= $db->prepare($sql);
$stmt->execute([$id]);

?>