<?php

include 'connectdb.php';

$id = $_POST['id'];

$stmt = $db->query("SELECT projet_miniature FROM projet WHERE projet_id =".$id);
$projet = $stmt->fetch();
unlink('../uploaded_files/'.$projet['projet_miniature']);

$sql = "DELETE FROM projet WHERE projet_id=?";
$stmt= $db->prepare($sql);
$stmt->execute([$id]);

?>