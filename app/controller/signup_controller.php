<?php

/* 
 * @Author : Gourav Tiwari
 * @Purpose : to implement functionalities related to signup
 * @Date : 14/04/2023
 */
class SignupController
{

  /* 
   * @Author : Gourav Tiwari
   * @Purpose : to take action on signup data filled by user
   * @Date : 14/04/2023
   */
  function signup_action()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $userid = $_POST['userid'];
    $designation = $_POST['designation'];
    $mobile = $_POST['mobile'];

    $uppercase = preg_match('@[A-Z]@', $password); // verifying password contains uppercase characters or not
    $lowercase = preg_match('@[a-z]@', $password); // verifying password contains lowercase characters or not
    $number = preg_match('@[0-9]@', $password); // verifying password contains numeric characters or not
    $specialChars = preg_match('@[^\w]@', $password); // verifying password contains special characters or not
    if (!preg_match('/[a-zA-Z]{3,20}$/', $firstname) || !preg_match('/[a-zA-Z]{3,20}$/', $lastname) || !preg_match('/[a-zA-Z]{3,15}$/', $designation)) { //validating first name, last name and designation
      return array("response" => "fail");
    }
    if ($age < 5 || $age > 100) { //validating age 
      return array("response" => "fail");
    }
    if (!preg_match('/^[a-zA-Z0-9]{5,15}$/', $userid)) { //validating user id
      return array("response" => "fail");
    }
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7 || strlen($password) > 15) { //validating password
      return array("response" => "fail");
    }
    if (!preg_match('/^[6-9][0-9]{9}+$/', $mobile)) { //validating mobile number
      return array("response" => "fail");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validating email id
      return array("response" => "fail");
    }
    $SignupObject = new SignupModel();
    $result = $SignupObject->check($email, $password, $firstname, $lastname, $userid, $age, $designation, $mobile); // passing the signup credentials to check user is exist or not
    if ($result == "true") {
      $_SESSION['email'] = $email; //storing email in session variable 
      $_SESSION['user'] = 0; //storing user type in session variable 
      return array("response" => 'success', "user" => $email);
    } else {
      return array("response" => 'fail');
    }

  }

  /* 
   * @Author : Gourav Tiwari
   * @Purpose : to display signup page
   * @Date : 14/04/2023
   */

  public function signup_view()
  {

    return include ROOT_DIR_VIEW . '\signup.php';
  }
}

?>