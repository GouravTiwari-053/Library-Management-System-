/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to validate login form 
* @Date : 14/04/2023
*/
function validateForm() {

  let email = $("#emu").val();
  let password = $("#psw").val()
  let eml = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; // email regax expression
  let pas = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/; //password regax expression

  if (!eml.test(email)) {  //email validation
    alert("Enter valid Email or userid ");
    return false;
  }

  if (!pas.test(password)) { //password validation
    alert("Incorrect Password! Please Enter a valid Password");
    return false;
  }
  object = { email: email, password: password }
  $.ajax({
    type: 'POST',
    url: 'http://localhost/LMS_app/login',
    dataType: 'JSON',
    data: object,
    success: function (data) {

      if (data.user == 0) {

        window.location.href = "http://localhost/LMS_app/all_books"; //redirectig to user dashboard all books section
      }
      else if (data.user == 1) {

        window.location.href = "http://localhost/LMS_app/all_users"; //redirectig to admin dashboard all user section
      }
      else {

        alert("User Not Exist!! Please Enter Correct Email and Password");
      }

    },
    error: function () {
      alert("User Not Exist!! Please Enter Correct Email and Password");
    }

  });

}
$('#login_form').on('submit', function (e) {
  e.preventDefault(); //preventing the input data in login form
  validateForm();
});