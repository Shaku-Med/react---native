<!DOCTYPE html>
<html lang="en">

    <?php  

  include 'd.php';
  include 'random.php';
  if(!isset($_COOKIE["useremailid"]) && !isset( $_COOKIE["usersid"]) ){ 

    echo '<script>window.open("login.php", "_self")</script>';

  }


  
    
     

    $specificusr = $_COOKIE['usersid'];
    $setUsrsget = mysqli_real_escape_string($conn, $_GET['i']);

   if($setUsrsget){ 
     $maincusr = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$setUsrsget} '");
    $rosou = mysqli_fetch_assoc($maincusr);

    $getyourself = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$specificusr} '");
    $row_gets = mysqli_fetch_assoc($getyourself);
   }
   else { 

     echo '<script>window.open("login.php", "_self")</script>';

   }
  


  
 
 
 ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no viewport-fit=cover">
        <meta property="og:type" content="Chat App" />
        <meta property="og:url" content="./index" />
        <meta property="og:image" content="./logo.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="shortcut icon" href="./logo.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="./logo.png">

        <title>Verify Email</title>
        <link rel="stylesheet" href="index.css">
    </head>


    <body>

        <style>
        .vcov {
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .verification_t {
            padding: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0px 0px 10px #7eeec1ba;

            border-radius: 10px;
        }

        .verification_t a button {
            width: 100%;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
            background: var(--maincl);
            color: var(--mainBg);
        }

        </style>


        <?php 

        if($rosou['verification'] == "verified"){ 

            echo '

               <div class="vcov">
            <div class="verification_t">
                <h3>This Link has Expired.</h3>
            </div>

        </div>
            
            
            ';

        }

        else { 

            $vef = "verified";
            $ssq = mysqli_query($conn, "UPDATE usr SET verification='$vef' WHERE unic_id='$setUsrsget' ");

            if($ssq){ 
                echo '
    
                 <div class="vcov">
                <div class="verification_t">
                    <h3>Hi '.$rosou['fname'].', Your Email has been verified.</h3>
                    <hr>
                    <p>Click on this button to login. </p>
                    <a href="">
                        <button>Login</button>
                    </a>
                    <hr>
                    <p>Welcome! we are sure you will have a great time with friends. :).</p>
                </div>
    
            </div>
                
                
                ';

            }

            else { 


                  echo '

               <div class="vcov">
            <div class="verification_t">
                <h3>Unable to verify this account</h3>
            </div>

        </div>
            
            
            ';



            }

        }
       
       ?>


    </body>

</html>
