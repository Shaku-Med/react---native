<!DOCTYPE html>
<html lang="en">

    <?php  

  include 'd.php';
  if(!isset($_COOKIE["useremailid"]) && !isset( $_COOKIE["usersid"]) ){ 

    echo '<script>window.open("login.php", "_self")</script>';

  }

  $userid = $_COOKIE["usersid"];

  $getppname = mysqli_query($conn, "SELECT * FROM usr WHERE  unic_id='{$userid}' ");

  $roos = mysqli_fetch_assoc($getppname);

 
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

        <title><?php echo $roos['fname']."_".$roos['lname'] ?> Profile | Medzy</title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="index.css">
    </head>


    <body>

        <div class="profile_card">

            <div class="card">
                <div class="imgPr">
                    <img id="profileimg" src="<?php echo $roos['profilepic']?> " alt="John" style="width:100%">
                    <div class="form_part">
                        <form id="formtype" enctype="multipart/form-data">
                            <input accept="image/jpg, image/jpeg, image/*" type="file" name="change_pp"
                                style="display:none" id="upd">
                            <label for="upd">Change Profile pic</label>
                            <div class="setBtn">
                                <button class="mainclick">Set As Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
                <h3 style="margin-top: 10px;"><?php echo $roos['fname']." ".$roos['lname'] ?></h3>
                <p class="title"><?php echo $roos['adminpart'] ?></p>
                <hr>

                <p style="padding:10px;">Welcome <?php echo $roos['fname']." ".$roos['lname'] ?> To Medzy's online free
                    chatting with all kinds
                    of people online. This platform is totally free... For your to get to chat with your own friends,
                    share this website's link with them
                </p>
                <hr>
                <div class="logo_bg">
                    <p>click on this button if your want to logout of this website</p>
                    <a href="signout.php">Logout</a>
                </div>

            </div>
        </div>
        <div class="people_chat">
            <div class="caht_i">

                <?php 

               
                $getusrs = mysqli_query($conn, "SELECT * FROM usr ");
               

                while($start_rand = mysqli_fetch_assoc($getusrs)){ 

                    if($start_rand['verification'] == "verified"){ 

                     
                        if($start_rand['unic_id'] != $userid ){ 

  
                            echo '

                                <div class="chat_1">
                                    <div class="pp_img">
                                        <img src="'.$start_rand['profilepic'].'" alt="">
                                    </div>
                                    <div class="usr_name">
                                        <p>'.$start_rand['fname']." ".$start_rand['lname']." ".'</p>
                                        <hr>
                                        <p>'.$start_rand['adminpart'].'</p>
                                    </div>
                                    <div class="caht_box">
                                        <button id="'.$start_rand['unic_id'].'" class="clickedbrn">
                                            <img src="./logo.png" alt="">
                                            <p>Chat With</p>
                                        </button>
                                    </div>
                                </div>
                            
                            
                            ';



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
        <style>
        .caht_box button img {
            width: 1.5rem;
            height: 1.5rem;
            transition: .5s ease-in-out;
        }

        img {
            transition: .5s ease-in-out;
        }

        .chat_1:hover button {
            animation: blinking .5s ease 2;
        }

        .chat_1:hover img {

            transform: scale(1.2);
        }

        @keyframes blinking {

            0% {
                opacity: 0.2;
            }

        }

        .chat_1 {
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0px 0px 10px grey;
            text-align: center;

        }

        .chat_1 img {
            width: 100%;
            object-fit: cover;
            -o-object-fit: cover;
            object-position: 0px 0px;
            height: 200px;

        }

        .people_chat {
            padding: 10px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px;
        }

        .people_chat img {
            width: 100%;
        }

        .caht_i {
            width: 100%;
            max-width: 1000px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .profile_card {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 40px;
            text-align: center;
            color: var(--mainBg);
        }

        .card img {
            width: 10rem;
            height: 30rem;
            object-fit: cover;
            -o-object-fit: cover;
            object-position: center;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border: none;
            outline: none;
            width: 100%;
            max-width: 1000px;
            background: var(--maincl);
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .logo_bg a {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: var(--mainBg);
            color: var(--maincl);
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        .imgPr {
            position: relative;
        }

        .form_part {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form_part label {
            background: var(--maincl);
            padding: 10px;
            border-radius: 5px;
            border: none;
            color: var(--mainBg);
        }

        button {
            border: none;
            outline: none;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: var(--maincl);
            color: var(--mainBg);
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-align: center;
        }

        .mainclick {
            display: none;
        }

        @media screen and (max-width:600px) {

            .profile_card {
                padding: 10px;
                height: 100%;
            }

            .people_chat {
                padding: 10px;
            }
        }

        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
        let upd = document.querySelector("#upd")
        let profileimg = document.querySelector("#profileimg")
        let formtype = document.querySelector("#formtype")
        let mainclick = document.querySelector(".mainclick")



        formtype.addEventListener("submit", function(e) {

            e.preventDefault();

            $.ajax({
                url: "change_pp.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp);
                    mainclick.style.display = "none";


                }
            })


        })


        upd.addEventListener("change", function() {


            let file = this.files[0];

            if (file) {

                let reader = new FileReader();
                reader.addEventListener("load", function() {

                    let result = reader.result;
                    profileimg.src = result;

                    mainclick.style.display = "block";



                })

                reader.readAsDataURL(file);

            } else {

                alert("This is not a file")

            }

        })
        </script>

        <script>
        let clickedbrn = document.querySelectorAll('.clickedbrn')
        clickedbrn.forEach((btn) => {

            btn.addEventListener("pointerdown", function() {


                $.ajax({
                    url: "geturs.php",
                    type: "POST",
                    data: {
                        "clickedbrn": 1,
                        "setterid": btn.getAttribute("id")
                    },
                    success: function(data) {
                        if (data == "success") {
                            window.open("./", "_self");
                        }
                    }
                })


            })

        })
        </script>



    </body>

</html>
