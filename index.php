<!doctype html>
<html lang="en">
    <?php  

  include 'd.php';
  include 'random.php';
  if(!isset($_COOKIE["useremailid"]) && !isset( $_COOKIE["usersid"]) ){ 

    echo '<script>window.open("login.php", "_self")</script>';

  }

  if(!isset($_COOKIE['chatusid'])){ 

     echo '<script>window.history.back()</script>';

  }
  
    
     

    $specificusr = $_COOKIE['usersid'];
    $setUsrsget = $_COOKIE['chatusid'];

    $maincusr = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$setUsrsget} '");
    $rosou = mysqli_fetch_assoc($maincusr);

    $getyourself = mysqli_query($conn, "SELECT * FROM usr WHERE unic_id='{$specificusr} '");
    $row_gets = mysqli_fetch_assoc($getyourself);
  


  
 
 
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

        <title>Chat With <?php echo $rosou['fname']." ".$rosou['lname'] ?></title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>

        <div class="chat_sides">
            <div class="fri_side">
                <div class="youm">
                    <div class="you_pp">
                        <img src="<?php echo $row_gets['profilepic'] ?>" alt="">
                        <span>You</span>
                    </div>
                    <div class="closes">
                        <span style="cursor: pointer;" class="material-symbols-outlined">
                            close
                        </span>
                    </div>


                </div>
                <div class="first_friends">
                    <div class="firstf">
                        <?php 

               
                $getusrs = mysqli_query($conn, "SELECT * FROM usr ");
               

                while($start_rand = mysqli_fetch_assoc($getusrs)){ 

                    if($start_rand['verification'] == "verified"){ 

                     
                        if($start_rand['unic_id'] != $specificusr ){ 


                            if($start_rand['unic_id'] == $setUsrsget ){ 



                            }

                            else { 

                                   echo '

                                <div id="'.$start_rand['unic_id'].'" class="capin">
                                    <img src="'.$start_rand['profilepic'].'" alt="">
                                    <span>'.$start_rand['fname']." ".$start_rand['lname'].'</span>
                                </div>
                            
                            ';

                            }


                        }
                        else { 
                            
                        }


                    }
                    else { 
                        
                    }
                
                }
               
               ?>

                    </div>
                </div>
            </div>
            <div class="chat_sidese">
                <div class="user_header">
                    <div class="fri_pp">

                    </div>
                    <div class="last_side">
                        <div class="bars">
                            <span class="material-symbols-outlined">
                                menu
                            </span>
                        </div>
                        <div class="eliplse">
                            <span class="material-symbols-outlined">
                                more_vert
                            </span>
                        </div>
                    </div>
                </div>

                <style>
                .dropup_s {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                }

                .video_up span {
                    font-size: 2.5rem;
                }

                #chat_form input {
                    padding: 10px;
                    width: 100%;
                }

                #chat_form {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                }

                #chat_form button {
                    padding: 10px;
                    border: none;
                    outline: none;
                    background: var(--maincl);
                    color: var(--mainBg);
                }

                .send_chat {
                    width: 100%;
                    position: fixed;
                    bottom: 0;
                    padding: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    left: 0;
                    background: var(--mainBg);
                    box-shadow: 2px 2px 5px black;
                }

                .dropup_s {
                    width: 100%;
                    max-width: 1000px;
                }

                .othmsg img {
                    width: 2.5rem;
                    height: 2.5rem;
                    border-radius: 50%;
                    object-fit: cover;
                }

                .you_title {
                    display: flex;
                    align-items: center;
                    justify-content: start;
                    gap: 10px;
                }

                .chat_messages {
                    padding: 40px;
                    position: relative;
                }

                .other_msg {
                    background: var(--maincl);
                    color: var(--mainBg);
                    padding: 10px;
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    border-bottom-right-radius: 10px;
                    box-shadow: 2px 2px 5px #00000087;

                    margin-bottom: 10px;
                    width: fit-content;
                    max-width: 600px;

                }

                .you_msg {
                    background: var(--mainBg);
                    color: var(--maincl);
                    padding: 10px;
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                    box-shadow: 2px 2px 5px #00000087;

                    width: fit-content;
                    max-width: 600px;
                    margin-bottom: 10px;
                }

                .outgoing {

                    display: flex;
                    align-items: center;
                    justify-content: start;
                    width: 100%;

                }

                .incomng {

                    display: flex;
                    align-items: center;
                    justify-content: end;
                    width: 100%;

                }

                .msg {
                    font-size: 15px;
                }

                .msg img {
                    width: 100%;
                    object-fit: contain;
                }

                @media screen and (max-width:900px) {

                    .send_chat {
                        width: 100%;
                        display: block;
                        background: var(--mainBg);

                        box-shadow: 2px 2px 5px black;
                    }

                    .dropup_s {
                        width: 100%;
                    }

                }

                @media screen and (max-width:600px) {

                    .you_msg {
                        width: fit-content;
                        max-width: 300px;
                    }

                    .other_msg {

                        width: fit-content;
                        max-width: 300px;

                    }

                    .chat_messages {
                        padding: 10px;
                    }

                    .msg {
                        font-size: 13px;
                    }

                }

                @media screen and (max-width:330px) {

                    .you_msg {
                        width: fit-content;
                        max-width: 250px;
                    }

                    .other_msg {

                        width: fit-content;
                        max-width: 250px;

                    }

                }

                </style>

                <div class="chat_messages">
                </div>
                <h1 style="height:20vh;"></h1>

                <div class="send_chat">
                    <div class="dropup_s">

                        <div class="video_up">
                            <span style="cursor: pointer;" class="material-symbols-outlined">
                                image
                            </span>
                        </div>

                        <form id="chat_form">
                            <input class="<?php echo $setUsrsget ?>" placeholder="Enter Message" type="text"
                                name="chat_value" id="messages">
                            <button class="material-symbols-outlined" type="submit" name="send_chat">
                                send
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="simdim"></div>
        <div class="wanted_d">
            <div class="optionss">
                <div class="repotr">
                    <a href="">
                        Report
                    </a>
                </div>
            </div>
        </div>

        <style>
        .upload_img {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 60000000000000000;
            padding: 10px;
            height: 100%;
            flex-direction: column;
            background: var(--dmm);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            visibility: hidden;
            opacity: 0;
            transition: all .5s ease-in-out;

        }

        .upload_img.mainma {
            visibility: visible;
            opacity: 1;
        }

        .upload_img img {
            width: 100%;
            max-width: 500px;
            height: 300px;
            object-fit: contain;
        }


        .uploads {
            padding: 10px;
            overflow: hidden;
            border-radius: 10px;
            background: var(--mainBg);
            width: 100%;
            max-width: 500px;
        }

        #image_form label {
            width: 100%;
            background: var(--maincl);
            color: var(--mainBg);
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        #image_form button {
            width: 100%;
            background: var(--mainBg);
            color: var(--maincl);
            box-shadow: 2px 2px 5px #00000087;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            outline: none;
            border: none;
        }

        #image_form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .chat_messages {
            scroll-behavior: smooth;
        }

        </style>

        <div class="upload_img">
            <div class="close_bgn">
                <span style="cursor: pointer;" class="material-symbols-outlined">
                    close
                </span>
            </div>
            <div class="uploads">
                <div class="image_point">
                    <img id="images" src="<?php echo $rosou['profilepic'] ?>" alt="">
                </div>
                <form id="image_form">
                    <input value="<?php echo $setUsrsget ?>" type="hidden" name="sendtoval">
                    <input type="hidden" id="dateval" name="dateval">
                    <input accept="image/jpg, image/jpeg, image/png, image/gif, image/webm, image/webp, image/wav"
                        type="file" name="mainimg" style="display: none;" id="image_up">
                    <label for="image_up">Choose Image</label>
                    <button>Send</button>
                </form>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <script src="index.js"></script>


        <script>
        //send visibility state//


        document.addEventListener("visibilitychange", event => {
            if (document.visibilityState === "visible") {

                $.ajax({
                    url: "geturs.php",
                    type: "POST",
                    data: {
                        "set1": 1
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })

            } else {
                $.ajax({
                    url: "geturs.php",
                    type: "POST",
                    data: {
                        "set2": 1
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            }
        })
        </script>


        <script>
        function loadXMLDoc444() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector(".chat_messages").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "realtime.php", true);
            xhttp.send();
        }

        setInterval(() => {
            loadXMLDoc444()
        }, 1000);
        </script>

        <script>
        let image_up = document.querySelector("#image_up")
        let images = document.querySelector("#images")
        let image_form = document.querySelector("#image_form")
        let dateval = document.querySelector("#dateval")



        image_form.addEventListener("submit", function(e) {

            e.preventDefault();

            if (image_up.value == "") {

            } else {
                let datee = new Date();
                var montth = datee.getMonth(),
                    dnow = datee.getDate(),
                    daynow = datee.getDay(),
                    yr = datee.getFullYear(),
                    hr = datee.getHours(),
                    mn = datee.getMinutes();

                let alldate;

                let mons = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                    'Dec',
                ]

                let partday = ['Sun', 'Mon', 'Tues', 'Wedn', 'Thurs', 'Fri', 'Sat']


                if (hr < 12) {

                    if (mn < 10) {

                        alldate = partday[daynow] + " / " + mons[montth] + " / " + dnow + " / " + yr + " - " +
                            hr + ":" + "0" + mn + "Am"

                    }

                    if (mn >= 12) {

                        alldate = partday[daynow] + " / " + mons[montth] + " / " + dnow + " / " + yr + " - " +
                            hr + ":" + mn + "Am"

                    }

                }

                if (hr >= 12) {

                    if (mn < 10) {

                        alldate = partday[daynow] + " / " + mons[montth] + " / " + dnow + " / " + yr + " - " +
                            hr + ":" + "0" + mn + "Pm"

                    }

                    if (mn >= 12) {

                        alldate = partday[daynow] + " / " + mons[montth] + " / " + dnow + " / " + yr + " - " +
                            hr + ":" + mn + "Pm"

                    }

                }

                dateval.value = alldate;


                $.ajax({
                    url: "sendchatpic.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        image_up.value = ""
                        upload_img.classList.remove("mainma");

                    }
                })

            }

        })



        image_up.addEventListener("change", function() {

            let file = this.files[0];
            if (file) {

                let reader = new FileReader();

                reader.onload = function() {

                    let result = reader.result;

                    images.src = result;




                }

                reader.readAsDataURL(file);
            }



        })
        </script>

        <script>
        let fri_pp = document.querySelector(".fri_pp")


        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    fri_pp.innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "chatpp.php", true);
            xhttp.send();
        }

        setInterval(() => {

            loadXMLDoc();

        }, 1000);

        let you_pp = document.querySelector(".you_pp");

        you_pp.addEventListener("click", function() {
            window.open("p", "_self");
        })
        </script>

        <script>
        let capin = document.querySelectorAll(".capin");

        capin.forEach((clicks) => {
            clicks.addEventListener("pointerdown", function() {


                $.ajax({
                    url: "geturs.php",
                    type: "POST",
                    data: {
                        "changeusr": 1,
                        "usridherr": clicks.getAttribute("id")
                    },
                    success: function(data) {
                        if (data == "success") {
                            location.reload();
                        }
                    }
                })


            })
        })
        </script>

        <script>
        let chat_form = document.querySelector("#chat_form");
        let messages = document.querySelector("#messages");
        chat_form.addEventListener("submit", function(e) {

            e.preventDefault();


            if (messages.value != "") {




                let dates = new Date();
                var month = dates.getMonth(),
                    datenow = dates.getDate(),
                    day = dates.getDay(),
                    year = dates.getFullYear(),
                    hors = dates.getHours(),
                    minu = dates.getMinutes();

                let alldate;

                let mons = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                    'Dec',
                ]

                let partday = ['Sun', 'Mon', 'Tues', 'Wedn', 'Thurs', 'Fri', 'Sat']


                if (hors < 12) {

                    if (minu < 10) {

                        alldate = partday[day] + " / " + mons[month] + " / " + datenow + " / " + year + " - " +
                            hors + ":" + "0" + minu + "Am"

                    }

                    if (minu >= 12) {

                        alldate = partday[day] + " / " + mons[month] + " / " + datenow + " / " + year + " - " +
                            hors + ":" + minu + "Am"

                    }

                }

                if (hors >= 12) {

                    if (minu < 10) {

                        alldate = partday[day] + " / " + mons[month] + " / " + datenow + " / " + year + " - " +
                            hors + ":" + "0" + minu + "Pm"

                    }

                    if (minu >= 12) {

                        alldate = partday[day] + " / " + mons[month] + " / " + datenow + " / " + year + " - " +
                            hors + ":" + minu + "Pm"

                    }

                }




                $.ajax({
                    url: "sendchat.php",
                    type: "POST",
                    data: {

                        "subbtn": 1,
                        "chattoid": messages.getAttribute("class"),
                        "chatmessage": messages.value,
                        "datesent": alldate

                    },
                    success: function(data) {

                        messages.value = "";


                    }
                })

            }

            if (messages.value == "") {
                messages.focus();
            }

        })
        </script>

    </body>

</html>
