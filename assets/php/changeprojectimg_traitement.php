<?php

include 'connectdb.php';
$new_img = $_POST['new_img'];
$new_img = str_replace('"', "", $new_img);
$new_img = str_replace("'", "", $new_img);
$id = mysqli_real_escape_string($link,$_POST['id']);

$stmt = $db->query("SELECT projet_miniature FROM projet WHERE projet_id =".$id);
$projet = $stmt->fetch();
unlink('../uploaded_files/'.$projet['projet_miniature']);

$sql = "UPDATE projet SET projet_miniature=? WHERE projet_id=".$id;
$stmt= $db->prepare($sql);
$stmt->execute([$new_img]);

?>