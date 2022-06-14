<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "exorentree";
 $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 try {
  $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}

?>