<!DOCTYPE html>
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

        <title>Signup | Medzy</title>
        <link rel="stylesheet" href="signup.css">
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <div class="form">
            <div class="error_form_col">
                <h3 class="grettings"></h3>
                <hr>
                <div class="errormag"></div>

                <form id="login_form">

                    <div id="colmain" class="col">

                        <input ariaHasPopup="true" autocomplete="true" type="text" placeholder="Enter Your First Name"
                            name="fname" id="fname">

                        <input ariaHasPopup="true" autocomplete="true" type="text" placeholder="Enter Your Last Name"
                            name="lname" id="lname">

                    </div>
                    <div class="col">
                        <input ariaHasPopup="true" autocomplete="true" type="email" placeholder="Enter Your Email"
                            name="email" id="email">
                    </div>
                    <div class="col">
                        <input ariaHasPopup="true" autocomplete="true" type="password" placeholder="Enter Your Password"
                            name="password" id="passowrd">
                    </div>
                    <div class="col">
                        <button name="signupbtn" type="submit">Signup</button>
                    </div>
                </form>
                <div class="explain">
                    <span>Already Have an Account? <a href="./login">Login</a></span>
                </div>
                <p class="anything">Anything your type in here is well secured.</p>
            </div>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
        let grettings = document.querySelector(".grettings");
        let dates = new Date();

        let hours = dates.getHours();
        console.table(hours);

        if (hours < 12) {

            grettings.innerHTML = "GoodMorning! ";

        }

        if (hours >= 12) {

            grettings.innerHTML = "GoodAfternoon! ";

        }


        if (hours >= 16) {

            grettings.innerHTML = "GoodEvening! ";

        }

        /////////////////////This is the end for the date making...//////////////

        let email = document.querySelector("#email")
        let passowrd = document.querySelector("#passowrd")
        let errormag = document.querySelector(".errormag")
        let fname = document.querySelector("#fname")
        let lname = document.querySelector("#lname")
        let login_form = document.querySelector("#login_form")
        let timerout = Math.floor(Math.random() * 10000) - 10;
        let emailregix = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{3,3})+$/;
        let passwordregix = /^(?=.*[0-9])(?=.*[!@?#$%^&*])[a-zA-Z0-9!@?#$%^&*]{7,15}$/;
        let nameregix = /^[a-zA-Z ]{2,30}$/;;

        login_form.addEventListener("submit", function(e) {

            e.preventDefault()


            if (fname.value != "" && fname.value.length >= 2 && fname.value == fname.value.split(' ')[0] &&
                fname.value.match(nameregix) && lname.value != "" && lname.value.length >= 2 && lname.value ==
                lname.value.split(' ')[0] && lname.value.match(nameregix) &&
                email.value != "" && email.value.length >= 6 && email.value.match(emailregix) && passowrd
                .value != "" && passowrd.value.length >= 8 && passowrd.value.match(passwordregix)) {


                $.ajax({

                    url: "app.php",
                    type: "POST",
                    data: {
                        "signup": 1,
                        "fname": fname.value.split(' ')[0],
                        "lname": lname.value.split(' ')[0],
                        "email": email.value,
                        "password": passowrd.value

                    },
                    success: function(data) {

                        errormag.innerHTML = data;
                        errormag.classList.add("erru");
                        passowrd.focus();
                        setTimeout(() => {
                            errormag.innerHTML = "";
                            errormag.classList.remove("erru");
                        }, timerout);

                        if (data == "Success") {

                            window.open('ppupdate.php', '_self');

                        }

                    }

                })

                errormag.innerHTML = "";
                errormag.classList.remove("erru");
            }




            if (!passowrd.value.match(passwordregix)) {
                errormag.innerHTML = "Your Password must contain letters and symbols";
                errormag.classList.add("erru");
                passowrd.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (passowrd.value.length < 8) {
                errormag.innerHTML = "password must be up to 8++ letters and symbols";
                errormag.classList.add("erru");
                passowrd.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (passowrd.value == "") {
                errormag.innerHTML = "Do Not Leave The Password Field Empty";
                errormag.classList.add("erru");
                passowrd.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }


            if (!email.value.match(emailregix)) {
                errormag.innerHTML = "Please Type in your real Email";
                errormag.classList.add("erru");
                email.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (email.value.length < 6) {
                errormag.innerHTML = "This is not a real Email";
                errormag.classList.add("erru");
                email.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (email.value == "") {
                errormag.innerHTML = "Do Not Leave The email Empty";
                errormag.classList.add("erru");
                email.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }




            /////////////////////////////////////





            if (!lname.value.match(nameregix)) {
                errormag.innerHTML = "Please Type in your real Email";
                errormag.classList.add("erru");
                lname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (lname.value != lname.value.split(' ')[0]) {

                errormag.innerHTML = "Just Type in your Last Name";
                errormag.classList.add("erru");
                lname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);

            }

            if (lname.value.length < 2) {
                errormag.innerHTML = "Invalid Name length";
                errormag.classList.add("erru");
                lname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (lname.value == "") {
                errormag.innerHTML = "Do Not Leave The Names Empty";
                errormag.classList.add("erru");
                lname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }




            //////////////////////////


            if (!fname.value.match(nameregix)) {
                errormag.innerHTML = "Please Type in your real Email";
                errormag.classList.add("erru");
                fname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (fname.value != fname.value.split(' ')[0]) {

                errormag.innerHTML = "Just Type in your First Name";
                errormag.classList.add("erru");
                fname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);

            }

            if (fname.value.length < 2) {
                errormag.innerHTML = "Invalid Name length";
                errormag.classList.add("erru");
                fname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }

            if (fname.value == "") {
                errormag.innerHTML = "Do Not Leave The Names Empty";
                errormag.classList.add("erru");
                fname.focus();
                setTimeout(() => {

                    errormag.innerHTML = "";
                    errormag.classList.remove("erru");

                }, timerout);
            }


        })
        </script>

    </body>

</html>
