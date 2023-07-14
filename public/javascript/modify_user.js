/*
* @Author : Gourav Tiwari
* @Purpose : To implement functions related to get user details in user edit form, make user admin, delete a user, edit a user form validation
* @Date : 14/04/2023
*/



/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to get user details in user edit form
* @Date : 14/04/2023
*/
function getuserdetails(first_name, last_name, user_id, email, password, mobile, age, designation) {
    $('#hidden_user_id').val(email);
    $('#first_name').val(first_name);
    $('#last_name').val(last_name);
    $('#user_id').val(user_id);
    $('#email').val(email);
    $('#password').val(password);
    $('#mobile').val(mobile);
    $('#age').val(age);
    $('#designation').val(designation);
    $('#Email').val(email);
    $('#myModal').modal('show');
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to make a request to convert a user into admin
* @Date : 14/04/2023
*/
function make_admin(email) {
    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/make_admin',
        dataType: 'JSON',
        data: { Email: email },
        success: function (data) {
            window.location.href = "http://localhost/LMS_app/all_users"; // redirecting to all users page
        },
        error: function () {
            alert("something went wrong");
        }

    });
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to make a request to delete a user
* @Date : 14/04/2023
*/
function delete_user(email) {
    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/delete_user',
        dataType: 'JSON',
        data: { Email: email },
        success: function (data) {
            window.location.href = "http://localhost/LMS_app/all_users"; // redirecting to all users page
        },
        error: function () {
            alert("something went wrong");
        }

    });
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to edit form validation 
* @Date : 14/04/2023
*/
function edit_form_validation() {

    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var user_id = $("#user_id").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var age = $("#age").val();
    var designation = $("#designation").val();
    var password = $("#password").val();
    var Email = $("#Email").val();
    age = parseInt(age);
    var eml = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; //email regax expression
    var usr = /^[a-zA-Z0-9]+$/;  //username regax expression
    var fn = /^[a-zA-Z]+[a-zA-Z]+$/; //first name regax expression
    var ln = /^[a-zA-Z]+[a-zA-Z]+$/; //last name regax expression
    var mb = /^[6-9][0-9]{9}$/;     //mobile number regax expression
    var dsg = /^[a-zA-Z]+[a-zA-Z]+$/; //designation regax expression
    var pas = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/; //password regax expression
    if (!fn.test(first_name) || (first_name.length < 3 || first_name.length > 20)) {   //first name validation
        alert("Enter First Name in alphabets and length should be in between 4 to 20");
        return false;
    }
    if (!ln.test(last_name) || ((last_name.length) < 3 || (last_name.length) > 20)) { //last name validation
        alert("Enter Last Name in alphabets and length should be in between 4 to 20");
        return false;
    }
    if (!user_id.match(usr) || ((user_id.length) < 5 || (user_id.length) > 15)) {  //user id validation
        alert("Enter UserID only in alphabets or numbers, length should in between 5 to 15 ");
        return false;
    }
    if (!eml.test(email)) {   //email validation
        alert("Enter a valid email address");
        return false;
    }
    if (!mobile.match(mb)) { //mobile validation
        alert("Mobile Number should start with 6 to 9, and length should be of 10 digits");
        return false;
    }
    if (age < 5 || age > 100) { //age validation
        alert("Age should be greater than 5 years and less than 100 years");
        return false;
    }
    if (!(dsg.test(designation)) || (designation.length < 3 || designation.length > 15)) {   //designation validation
        alert("Enter Designation in alphabets only, and length should be in between 3 to 15");
        return false;
    }
    if (!pas.test(password)) {  //password validation
        alert("Incorrect Password! Password must containt alteast 1 number,alteast 1 capital alphabet character, alteast 1 small alphabet character, atleast 1 special character and length must be in between 7 to 15");
        return false;
    }
    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/edit_user',
        dataType: 'JSON',
        data: { first_name: first_name, last_name: last_name, email: email, user_id: user_id, age: age, designation: designation, mobile: mobile, password: password, Email: Email },
        success: function (data) {
            if (data == "true") {
               
                window.location.href = "http://localhost/LMS_app/all_users"; // redirecting to all users page
            }
        },
        error: function () {  //error function
            alert("Something Went Wrong");
        }
    });
}
