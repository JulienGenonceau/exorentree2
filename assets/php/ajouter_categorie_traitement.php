<?php

include 'connectdb.php';
$sql = "INSERT INTO categorie (categorie_name) VALUES (?)";
$stmt= $db->prepare($sql);

$newname = $_POST['categorie_name'];
$newname = str_replace('"', "", $newname);
$newname = str_replace("'", "", $newname);
$stmt->execute([$newname]);

?>