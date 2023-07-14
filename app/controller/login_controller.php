<?php

/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement login related functionalities
 * @Date : 14/04/2023
 */
class LoginController
{

  /* 
   * @Author : Gourav Tiwari
   * @Purpose : to take action on data filled by user/admin in login form
   * @Date : 14/04/2023
   */
  function login_action()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password); //verifying upercase character exist in $password or not
    $lowercase = preg_match('@[a-z]@', $password); //verifying lowecase character exist in $password or not
    $number = preg_match('@[0-9]@', $password); //verifying numeric character exist in $password or not
    $specialChars = preg_match('@[^\w]@', $password); //verifying special character exist in $password or not

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7 || strlen($password) > 15) { // password validation
      return array("user" => "false");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //email validation
      return array("user" => "false");
    }
    $loginObject = new LoginModel();
    $result = $loginObject->login_check($email, $password);
    if ($result == 0 || $result == 1) { // checking the login credentails is of admin or user, then only assign in session variables
      $_SESSION['email'] = $email; //storing email id in session variable
      $_SESSION['password'] = $password; //storing password in session varialbe
      $_SESSION['user'] = $result; //storing user typein session variable
    }
    return array("user" => $result);
  }

  /* 
   * @Author : Gourav Tiwari
   * @Purpose : to display login form
   * @Date : 14/04/2023
   */
  public function login_view()
  {

    return include ROOT_DIR_VIEW . '\login.php';
  }
}

?>