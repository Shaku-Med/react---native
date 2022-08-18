<?php

   include 'd.php';
   include 'random.php';
   
   $date = date('Y/m/d H:i:s'); 
 

  if(isset($_POST['signup'])){ 
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin_w = "Admin";

    $selector = mysqli_query($conn, "SELECT * FROM usr WHERE email='{$email}' ");

    $select_d = mysqli_fetch_assoc($selector);

    if($select_d > 0){ 

        echo "This email is already in use.";

    }
    else { 

        if($email == "adminmedzy@admin.com"){
            
               $send_sign = mysqli_query($conn, "INSERT INTO usr (fname, lname, email, pass, unic_id, adminpart) VALUES ('{$fname}', '{$lname}', '{$email}', '{$password}', '{$pass}', '{$admin_w}')");
    
                if($send_sign){ 
                    setcookie("fakeid", $pass );
                    echo 'Success';
                }
                else { 
            
                    echo "Error";
            
                }

        }

        else { 

               $send_sign = mysqli_query($conn, "INSERT INTO usr (fname, lname, email, pass, unic_id) VALUES ('{$fname}', '{$lname}', '{$email}', '{$password}', '{$pass}')");
    
                if($send_sign){ 
                    setcookie("fakeid", $pass);
                     echo 'Success';
                }
                else { 
            
                    echo "Error";
            
                }

        }
       
    }


  }


   if(isset($_POST['login'])){ 

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql1 = mysqli_query($conn, "SELECT * FROM  usr WHERE email='{$email}' ");

        $row1 = mysqli_fetch_assoc($sql1);

         if(mysqli_num_rows($sql1) > 0){ 

             if($password === ($row1['pass'])){ 


                if($row1['verification'] == "verified"){ 


                    if($row1['profilepic'] > 0){ 
    
                       
                                        
                        $sqliz = mysqli_query($conn, "UPDATE usr SET datesend='{$date}' WHERE email='{$email}' ");

                                        if($sqliz){ 

                                            setcookie("useremailid", $email) ; 
                                            setcookie("usersid", $row1['unic_id']); 
                                            
                                            echo "Success";

                                        }
                        
                    }
                    else { 
    
                        echo "Sorry, You Can't Login if you've not updated your profile pic. <a href='ppupdate'>click me</a> ";
                   
                    }

                }

                else { 


                      echo "Your Email is not Verified yet. Please check your email to verify your account";



                }





             }
             else { 

                echo "Email Or Password is not Correct";
            
             }

         }

         else { 

            echo "

            This Email Is not Registered. Please Register Your Email.  <a href='signup' >Signup</a>
            
            ";


         }
        



   }
  


?>
