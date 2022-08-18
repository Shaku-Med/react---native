<!doctype html>
<html lang="en">



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

        <title>Chat With Medzy Ems Amara</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="pp.css">
    </head>

    <?php 

       session_start();
      if(!isset($_COOKIE['fakeid'])){

         echo '<script>window.open("signup.php", "_self")</script>';

      }

    ?>


    <body>




        <div class="nice_imgbg">
            <div class="pp_img">
                <img class="change_imag" src="https://images.pexels.com/photos/13146110/pexels-photo-13146110.jpeg"
                    alt="">
            </div>

            <div class="formPart">
                <form enctype="multipart/form-data">
                    <input accept="image/jpg, image/jpeg, image/*" type="file" name="file" style="display: none;"
                        id="update_pp">
                    <label for="update_pp">Update Profile</label>
                    <button id="sendbtn" name="changepp" type="submit">Send</button>
                </form>
            </div>

            <p>
                In-order to use our website's main page, You have to update your profile pic, please update your profile
                picture and
                do not forget to check your email for your email verification link to verify the email account you
                signed up with.
            </p>



            <p style="background: var(--maincl); color:var(--mainBg); padding:10px; border-radius: 5px;">Please Check
                Your Email to verify
                your account
            </p>
        </div>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
        let update_pp = document.querySelector("#update_pp")
        let form = document.querySelector("form")
        let change_imag = document.querySelector(".change_imag")
        let body = document.querySelector("body")
        let sendbtn = document.querySelector("#sendbtn")


        form.addEventListener("submit", function(e) {

            e.preventDefault();

            if (update_pp.value == "") {

                alert("Click on the update profile and choose your profile pic");

            } else {

                $.ajax({
                    url: "./uploads.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "success") {
                            window.open("login.php", "_self");
                        }
                    }
                })

            }

        })

        update_pp.addEventListener("change", function() {

            let file = this.files[0];

            if (file) {

                let reader = new FileReader();
                reader.addEventListener("load", function() {

                    let result = reader.result;
                    change_imag.src = result;
                    body.style.backgroundImage = `

                   linear-gradient(
                    to bottom,
                    var(--dmm) 30%,
                    var(--mainBg) 50%
                    ),
                    url(${result})
                    
                    `;

                    sendbtn.classList.add("sendbtn")


                })

                reader.readAsDataURL(file);

            } else {

                alert("This is not a file")

            }

        })
        </script>

    </body>

</html>
