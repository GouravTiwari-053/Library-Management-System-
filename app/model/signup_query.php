<?php
/* 
* @Author : Gourav Tiwari
* @Purpose : To implement and execute query related to signup
* @Date : 14/04/2023
*/
class SignUpModel
{

/* 
* @Author : Gourav Tiwari
* @Purpose : To implement and execute queries to check user exist or not, and signup
* @Date : 14/04/2023
*/    
    function check($email, $password, $firstname, $lastname, $userid, $age, $designation, $mobile) 
    {
        $db = new DataBase();
        $sql = "SELECT email FROM person WHERE email='$email' OR user_name='$userid'";
        $result = mysqli_query($db->conn, $sql);
        if ($result->num_rows > 0) {
            return "false";
        } else {
            $sql = "INSERT INTO person (first_name, last_name, user_name, email, mobile, age, designation, password) values('$firstname','$lastname','$userid','$email','$mobile',$age,'$designation','$password')";
            $res = mysqli_query($db->conn, $sql);
            mysqli_close($db->conn);
            return "true";
        }

    }
}
?>