<?php

include 'connectdb.php';
$new_link = $_POST['new_link'];
$new_link = str_replace('"', "", $new_link);
$new_link = str_replace("'", "", $new_link);
$id = mysqli_real_escape_string($link,$_POST['id']);

$sql = "UPDATE projet SET projet_link=? WHERE projet_id=".$id;
$stmt= $db->prepare($sql);
$stmt->execute([$new_link]);

?>