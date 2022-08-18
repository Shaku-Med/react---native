<?php 

 setcookie("chatusid", "", time()-3600);
 setcookie("useremailid", "", time()-3600);
 setcookie("usersid", "", time()-3600);

echo '<script>window.open("login.php", "_self")</script>';


?>
