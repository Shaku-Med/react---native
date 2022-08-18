<?php  

  include 'd.php';
  include 'random.php';
  if(!isset($_COOKIE["useremailid"]) && !isset( $_COOKIE["usersid"]) ){ 

    echo '<script>window.open("login.php", "_self")</script>';

  }

  if(!isset($_COOKIE['chatusid'])){ 

     echo '<script>window.history.back()</script>';

  }

  $specificusr = $_COOKIE["usersid"];
  $setUsrsget = $_COOKIE["chatusid"];

  $maincusr = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$setUsrsget} '");
  $rosou = mysqli_fetch_assoc($maincusr);
 
 ?>


<img src="<?php echo $rosou['profilepic'] ?>" alt="">
<span><?php echo $rosou['fname']." ".$rosou['lname']?></span>
<?php
if($rosou['deviceused'] == "online"){ 

                            echo ' <div class="status"></div>';

                         }
                         else { 
                            
                         }

                        ?>
