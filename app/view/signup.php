<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement signup page
* @Date : 14/04/2023
-->
<!DOCTYPE html>
<html>

<head>
    <title> Sign Up Page </title>
    <link href="http://localhost/LMS_app/public/css/signup_css.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form name="signup_form" id="signup_form" method="post"> <!-- Sign Up Form-->
            <h1> Sign Up</h1>
            <label>First Name : </label>
            <input type="text" id="fname" placeholder="Enter First Name Here" name="fname" maxlength="20" required>
            <label>Last Name : </label>
            <input type="text" id="lname" placeholder="Enter Last Name Here" name="lname" maxlength="20" required>
            <label> UserID: </label>
            <input type="text" id="userid" placeholder="Enter UserID" name="userid" maxlength="15" required>
            <label>Email ID: </label>
            <input type="text" id="email" placeholder="Enter Email" name="email" required>
            <label>Mobile No: </label>
            <input type="text" id="mobile" placeholder="Mobile Number Must be of 10 digits and starts with 6 to 9 only"
                name="mobile" maxlength="10" size="10" required>
            <label>Age: </label>
            <input type="number" id="age" placeholder="Enter Age" name="age" maxlength="3" required>
            <label>Designation: </label>
            <input type="text" id="desig" placeholder="Enter Designation" name="dsgn" maxlength="15" required>
            <label>Password: </label>
            <input type="password" id="pswd" placeholder="Enter Password" name="pswd" maxlength="15" required>
            <button type="submit" id="submit">Submit</button>
        </form>
        <a href="http://localhost/LMS_app/login"><button>Back To Login</button></a> <!-- Back to Login button-->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- including signup_js.js file to run javascript function and ajax call-->
    <script src="http://localhost/LMS_app/public/javascript/signup_js.js"></script>

</body>

</html>