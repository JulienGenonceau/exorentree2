<?php

var_dump($_POST['fakepost']);

if (isset($_FILES)){
    $file = $_FILES['projet_miniaturefile'];
    $filename = $file['name'];
    move_uploaded_file($file['tmp_name'],'../uploaded_files/'.$filename);
}

?>