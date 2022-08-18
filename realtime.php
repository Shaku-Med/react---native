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

  $getyourself = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$specificusr} '");
  $row_gets = mysqli_fetch_assoc($getyourself);
 
 ?>


                 <?php


                 $mysqlis = mysqli_query($conn, "SELECT * FROM chatsapp");
                   
               

                 while($myrow  = mysqli_fetch_assoc($mysqlis)){ 

                    $sid = $myrow['sendersid'];
                    $rid = $myrow['receiversid'];

                    ///////////////////////////
                    $selid = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='$sid' ");
                    $connasl = mysqli_fetch_assoc($selid);


                    $relid = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='$rid' ");
                    $relidrow = mysqli_fetch_assoc($relid);


                    ///////////////////////////

                    if($row_gets['email'] == $connasl['email'] || $row_gets['email'] ==  $relidrow['email'] ){ 

                       if(mysqli_num_rows($mysqlis) > 0){ 

                        if($setUsrsget == $myrow['sendersid'] || $setUsrsget == $myrow['receiversid'] ){ 


                             if($myrow['typeofmsg'] == "text")
                         { 

                            if($specificusr == $myrow['sendersid'] ){ 


                                echo '

                                   <div class="incomng">
                                    <div class="you_msg">
                                        <div class="you_title">
                                            <h4>You</h4>
                                        </div>
                                        <hr>
                                        <div class="msg">
                                           '.$myrow['message_sent'].'
                                        </div>
                                        <hr>
                                        <div class="date_sent">
                                          '.$myrow['dateofmes'].'
                                        </div>
                                    </div>

                                </div>
                                
                                
                                ';


                            }

                            else { 


                                echo '

                                   <div class="outgoing">
                                    <div class="other_msg">
                                        <div class="you_title">
                                            <div class="othmsg">
                                                <img src="'.$connasl['profilepic'].'"
                                                    alt="">
                                            </div>
                                            <span>'.$connasl['fname']." ".$connasl['lname'].'</span>
                                        </div>
                                        <hr>
                                        <div class="msg">
                                            '.$myrow['message_sent'].'
                                        </div>
                                        <hr>
                                        <div class="date_sent">
                                           '.$myrow['dateofmes'].'
                                        </div>
                                    </div>
                                </div>
                                
                                
                                ';
                                

                            }
                            
                         }


                         if($myrow['typeofmsg'] == "image"){ 


                        if($specificusr == $myrow['sendersid'] ){ 


                                echo '

                                    <div class="incomng">
                                    <div class="you_msg">
                                        <div class="you_title">
                                            <h4>You</h4>
                                        </div>
                                        <hr>
                                        <div class="msg">
                                            <img src="'.$myrow['message_sent'].'" alt="">
                                        </div>
                                        <hr>
                                        <div class="date_sent">
                                            '.$myrow['dateofmes'].'
                                        </div>
                                    </div>

                                </div>
                                
                                
                                ';


                            }

                            else { 


                                echo '

                                    <div class="outgoing">
                                    <div class="other_msg">
                                        <div class="you_title">
                                            <div class="othmsg">
                                                <img src="'.$connasl['profilepic'].'"
                                                    alt="">
                                            </div>
                                            <span>'.$connasl['fname']." ".$connasl['lname'].'</span>
                                        </div>
                                        <hr>
                                        <div class="msg">
                                            <img src="'.$myrow['message_sent'].'" alt="">
                                        </div>
                                        <hr>
                                        <div class="date_sent">
                                            '.$myrow['dateofmes'].'
                                        </div>
                                    </div>
                                </div>

                                
                                
                                ';
                                

                            }


                       }

                       



                       }


                       }
                       else { 
                         echo "No Message Sent Yet";
                       }
                       
                    }


                 }
                 
                 
                 ?>
