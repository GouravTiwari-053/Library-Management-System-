<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement login page
* @Date : 14/04/2023
-->
<!DOCTYPE html>
<html>

<head>
    <title> Login Page </title>
    <link href="http://localhost/LMS_app/public/css/login_css.css" rel="stylesheet">
    <p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
</head>

<body>
<p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
    <div class="container">
        <form name="login_form" id="login_form" method="post"> <!-- Login Form-->
            <h1> Login </h1>
            <label>Email or UserID : </label>
            <input id="emu" type="text" placeholder="Enter Email" name="emu" required>
            <label>Password : </label>
            <input id="psw" type="password" placeholder="Enter Password" name="psw" required maxlength="15">
            <button type="submit" id="submit">Submit</button>
            <br>
        </form>
        <a href="http://localhost/LMS_app/signup"><button>Sign Up</button></a> <!-- Sign Up button-->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- including login_js.js file to run javascript function and ajax call-->
    <script src="http://localhost/LMS_app/public/javascript/login_js.js"></script>

</body>

</html>