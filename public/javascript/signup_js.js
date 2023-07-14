/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to signup from validation and make a request to router for signup by sending user details using POST method
*/

function validateForm() {
   let firstname = $("#fname").val();
   let lastname = $("#lname").val();
   let userid = $("#userid").val();
   let email = $("#email").val();
   let mobile = $("#mobile").val();
   let age = $("#age").val();
   let designation = $("#desig").val();
   let password = $("#pswd").val();
   age = parseInt(age);
   let eml = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //email regax expression
   let usr = /^[a-zA-Z0-9]+$/; //user id regax expression
   let fn = /^[a-zA-Z]+[a-zA-Z]+$/; //first name regax expression
   let ln = /^[a-zA-Z]+[a-zA-Z]+$/; //last name regax expression
   let mb = /^[6-9][0-9]{9}$/; //mobile number regax expression
   let dsg = /^[a-zA-Z]+[a-zA-Z]+$/; //designation regax expression
   let pas = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/; //password regax expression
   if (!fn.test(firstname) || (firstname.length < 3 || firstname.length > 20)) { //firstname validation
      alert("Enter First Name in alphabets and length should be in between 4 to 20");
      return false;
   }
   if (!ln.test(lastname) || ((lastname.length) < 3 || (lastname.length) > 20)) { //lastname validation
      alert("Enter Last Name in alphabets and length should be in between 4 to 20");
      return false;
   }
   if (!userid.match(usr) || ((userid.length) < 5 || (userid.length) > 15)) {  // user id validation
      alert("Enter UserID only in alphabets or numbers, length should in between 5 to 15 ");
      return false;
   }
   if (!eml.test(email)) { //email validation
      alert("Enter a valid email address");
      return false;
   }
   if (!mobile.match(mb)) { //mobile number validation
      alert("Mobile Number should start with 6 to 9, and length should be of 10 digits");
      return false;
   }
   if (age < 5 || age > 100) {  //age validation
      alert("Age should be greater than 5 years and less than 100 years");
      return false;
   }
   if (!(dsg.test(designation)) || (designation.length < 3 || designation.length > 15)) { //designation validation
      alert("Enter Designation in alphabets only, and length should be in between 3 to 15");
      return false;
   }
   if (!pas.test(password)) {  //password validation
      alert("Incorrect Password! Password must containt alteast 1 number,alteast 1 capital alphabet character, alteast 1 small alphabet character, atleast 1 special character and length must be in between 7 to 15");
      return false;
   }
   $.ajax({
      type: 'POST',
      url: 'http://localhost/LMS_app/signup',
      dataType: 'JSON',
      data: { firstname: firstname, lastname: lastname, email: email, userid: userid, age: age, designation: designation, mobile: mobile, password: password },
      success: function (data) {
         if (data.response == "success") {
            window.location.href = "http://localhost/LMS_app/all_books"; //redirecting to user dashboard all books section
         }
         else {
            alert("User already exist!! Try with different Email id and Username");
         }
      },
      error: function () {
         alert("Something Went Wrong");
      }
   });
}
$('#signup_form').on('submit', function (e) {
   e.preventDefault(); //preventing the SignUp form data 
   validateForm();
});
