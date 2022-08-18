<?php 

  include 'd.php';
  include 'random.php';
  $specificusr = $_COOKIE["usersid"];

 $slt = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$specificusr}'");

  $rows = mysqli_fetch_assoc($slt);


  $target = "".$rows['fname'].'_'.$rows['lname'].$pass."profilepic".basename($_FILES['mainimg']['name']);
   $ext = pathinfo($target, PATHINFO_EXTENSION);
   if($ext!="jpg" && $ext!="jpeg" && $ext!="png" && $ext!="gif" && $ext!="webm" && $ext!="webp"){ 
    
           echo "<script>alert('Only JPG, PNG, JPEG, GIF, WEBM, WEBP  File's allowed to be sent')</script>";


   }
   else if(move_uploaded_file($_FILES['mainimg']['tmp_name'], $target)){ 
    
     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){ 
                                $url = "https://";
                            }
                            else { 
                                $url = "http://";
                            }

      $database_upd = $url.$_SERVER['HTTP_HOST'].'/allmychatapp/'.$target;

      $dateval = $_POST['dateval'];
      $sendtoval = $_POST['sendtoval'];
      $typeof = "image";

       $sql1 = mysqli_query($conn, "INSERT INTO chatsapp (sendersid, receiversid, message_sent, dateofmes, typeofmsg ) VALUES ('{$specificusr}', '{$sendtoval}', '$database_upd', '{$dateval}', '{$typeof}')");
       
        if($sql1){ 
            echo 'Success';
        }

   }



?>
