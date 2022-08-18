<?php 

  include 'd.php';
  include 'random.php';
   $sessid = $_COOKIE["fakeid"];

 $slt = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$sessid}'");

  $rows = mysqli_fetch_assoc($slt);


  $target = "".$rows['fname'].'_'.$rows['lname'].$pass."profilepic".basename($_FILES['file']['name']);
   $ext = pathinfo($target, PATHINFO_EXTENSION);
   if($ext!="jpg" && $ext!="jpeg" && $ext!="png" && $ext!="gif" && $ext!="webm" && $ext!="webp"){ 
    
           echo "<script>alert('Only JPG, PNG, JPEG, GIF, WEBM, WEBP  File's allowed to be sent')</script>";


   }
   else if(move_uploaded_file($_FILES['file']['tmp_name'], $target)){ 
    
     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ 
                                $url = "https://";
                            }
                            else { 
                                $url = "http://";
                            }

      $database_upd = $url.$_SERVER['HTTP_HOST'].'/allmychatapp/'.$target;

      $cot = mysqli_query($conn, "UPDATE usr SET profilepic='{$database_upd}' WHERE  unic_id='$sessid' ");

      if($cot){ 
        echo "success";
      }

   }



?>
