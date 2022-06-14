<?php

include 'connectdb.php';
$new_name = $_POST['new_name'];
$new_name = str_replace('"', "", $new_name);
$new_name = str_replace("'", "", $new_name);
$id = mysqli_real_escape_string($link,$_POST['id']);

$sql = "UPDATE categorie SET categorie_name=? WHERE categorie_id=".$id;
$stmt= $db->prepare($sql);
$stmt->execute([$new_name]);

?>