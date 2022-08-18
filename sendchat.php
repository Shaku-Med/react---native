<?php 


include 'd.php';

 

  $specificusr = $_COOKIE["usersid"];
 
 if(isset($_POST['subbtn'])){ 

    $sendtoid = $_POST['chattoid'];
    $chatmessg = $_POST['chatmessage'];
    $datesent = $_POST['datesent'];
    $sendervals = str_replace("'", "\'", $chatmessg);

    $typeofmsg = "text";

    $sql1 = mysqli_query($conn, "INSERT INTO chatsapp (sendersid, receiversid, message_sent, dateofmes, typeofmsg ) VALUES ('{$specificusr}', '{$sendtoid}', '$sendervals', '{$datesent}', '{$typeofmsg}')");
    if($sql1){ 
        echo 'Success';
    }

 }

?>
