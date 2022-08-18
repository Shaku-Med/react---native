<?php 


  include 'd.php';
   $specificusr = $_COOKIE["usersid"];


  if(isset($_POST['clickedbrn'])){ 

    $valid = $_POST['setterid'];
    unset($_COOKIE["chatusid"]);
    setcookie("chatusid", $valid);
    
      echo 'success';
   
  }



  
  if(isset($_POST['changeusr'])){ 

    $valid = $_POST['usridherr'];
    unset($_COOKIE["chatusid"]);
   setcookie("chatusid", $valid);

    

        echo 'success';
    

  }


  if(isset($_POST['set1'])){ 

    $datetype = "online";

    $sql = mysqli_query($conn, "UPDATE usr SET deviceused='{$datetype}' WHERE unic_id='{$specificusr}' ");

    if($sql){ 
        echo "success";
    }

  }

    if(isset($_POST['set2'])){ 

    $datetype = "offline";

    $sql = mysqli_query($conn, "UPDATE usr SET deviceused='{$datetype}' WHERE unic_id='{$specificusr}' ");

    if($sql){ 
        echo "success";
    }

  }



?>
