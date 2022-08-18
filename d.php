<?php

  include 'hidedb.php';

  $conn = mysqli_connect($hostname, $uname, $upass, $dbname);

  if(!$conn){ 

    die("There Was An Error Connecting: ".mysqli_connect_error());
    exit();

  }


?>
