<?php
/* 
* @Author : Gourav Tiwari
* @Purpose : To implement and execute query related to login
* @Date : 14/04/2023
*/
class LoginModel
{

/* 
* @Author : Gourav Tiwari
* @Purpose : To implement and execute query to retrieve user type form the database
* @Date : 14/04/2023
*/    
    function login_check($email, $password) 
    {
        $db = new DataBase();
        $checkLogin = $db->conn->query("SELECT user FROM person WHERE email = '" . $email . "' AND password='" . $password . "' AND active_status='active'");

        if ($row = $checkLogin->fetch_object()) {
            return $row->user;
        } else {
            return "false";
        }
    }
}
?>