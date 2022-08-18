 <?php

   include 'header.php';
   include 'db.php';
  

    if(!isset($_COOKIE['useremailid']) && !isset($_COOKIE['usersid'])){ 

    echo "<script>window.open('login', '_self')</script>";

   }

   $usid = $_COOKIE['usersid'];

   $userppf = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$usid}'");



   

   ?>

 <link rel="stylesheet" href="conv.css">

 <body>

     <?php

      
            $otps = $_COOKIE['chatid'];

            $mymysq = mysqli_query($conn, "SELECT * FROM friends WHERE  unicid='$otps' OR personsid='{$otps}' ");

            $myrow = mysqli_fetch_assoc($mymysq);

           


            if($myrow['accept'] == "accepted"){ 

                $sqcon = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='$otps'");
                $coprow = mysqli_fetch_assoc($sqcon);

                $user_ppget = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$usid}' ");
                $upp_id = mysqli_fetch_assoc($user_ppget);

            }
            else { 
                echo "<script>alert('This person is not your friend')</script>";

                 echo "<script>window.history.back()</script>";
            }




             

        ?>






     <?php

                       $numn = $coprow['unic_id'];
                       $ti = $upp_id['email'];
                        $mysqlis = mysqli_query($conn, "SELECT * FROM chatmessages ");

                       
                        

                    while( $rowss = mysqli_fetch_assoc($mysqlis)){ 

                       if($upp_id['email'] == $rowss['receivermail'] || $upp_id['email'] == $rowss['sendermail']){ 
                        
                        if( $otps == $rowss['senderid'] || $otps == $rowss['receiversid'] ){ 

                            if($rowss['whosent'] == "text"){ 

                                
                            if($usid != $rowss['senderid']){
                                
                                echo '

                                <div style="margin-bottom: 20px; " id="othersmes" class="youmess">
                                <div class="profile_cap">
                                    <img src="'.$rowss['senderpp'].'" alt="">
                                    <div style="color:white;" class="nna">'.$rowss['sendername'].'</div>
                                </div>
                                <div style="background: var(--chatcl); color: white;" class="message_cap">
                                    '.$rowss['datemessagesent'].'
                                    <hr>
                                    <div class="date_s"></div>
                                </div>
                            </div>
                                
                                
                                ';

                            }

                            else { 

                                echo '


                                <div style="color: var(--maincl); margin-bottom: 20px; position: relative;" id="youmess"
                                class="youmess othersc">

                                <div id="youmsg">
                                    <div style="font-size:1.6rem; font-weight:bold" class="name_g">
                                        You
                                    </div>
                                    <hr>
                                     '.$rowss['datemessagesent'].'
                                    <hr>
                                    <div class="date_s"></div>
                                    <div style="position: absolute; right:20px; bottom:10px;" class="delete_bgn">
                                       
                                    </div>
                                </div>
                            </div>
                                
                                
                                
                                ';

                            }

                            }


                            
                        

                        }

                            

                       }
                       else { 
                        
                       }
                       
                    }
                                        

                     ?>


     <!-- 
if($rowss['whosent'] == "audio"){ 

                                if($usid != $rowss['senderid']){ 

                                    echo '


                                       <div style="margin-bottom: 20px;" id="othersmes" class="youmess">
                                    <div class="profile_cap">
                                        <img id="pppy" src="'.$rowss['senderpp'].'" alt="">
                                        <div style="color:white;" class="nna">'.$rowss['sendername'].'</div>
                                    </div>
                                    <div style="background: var(--chatcl); color: white;" class="message_cap">
                                        <audio type="audio/webm, audio/mp3, audio/webp" controls src="'.$rowss['datemessagesent'].'" id="mysud"></audio>
                                        <hr>
                                        <div class="date_s"></div>
                                    </div>
                                </div>
                                    
                                    
                                    ';
                                    

                                }

                                else { 

                                    echo '


                                       <div style="color: var(--maincl); margin-bottom: 20px; position: relative;" id="youmess"
                                        class="youmess othersc">

                                        <div id="youmsg">
                                            <div style="font-size:1.6rem; font-weight:bold" class="name_g">
                                                You
                                            </div>
                                            <hr>

                                            <audio id="mysud" type="audio/webm, audio/mp3, audio/webp" controls src="'.$rowss['datemessagesent'].'"></audio>
                                            <hr>
                                            <div class="date_s"></div>
                                            <div style="position: absolute; right:20px; bottom:10px;" class="delete_bgn">
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    ';

                                }

                            } -->
