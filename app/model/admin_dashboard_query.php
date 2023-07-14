<?php

/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement and execute queries related to admin functionalities
 * @Date : 14/04/2023
 */
class AdminModel
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query related to edit a user
     * @Date : 14/04/2023
     */
    function edit_user($first_name, $last_name, $user_id, $email, $password, $mobile, $age, $designation, $Email)
    {
        $db = new DataBase();
        $update_user = "UPDATE person SET first_name='" . $first_name . "', last_name='" . $last_name . "', user_name='" . $user_id . "', email='" . $email . "', mobile='" . $mobile . "', age='" . $age . "', designation='" . $designation . "', password='" . $password . "' where email='" . $Email . "'";

        if ($db->conn->query($update_user)) {
            return "true";
        } else {
            return "false";
        }
    }
    function make_admin($email) //function to run query for converting a user into admin
    {
        $db = new DataBase();
        if (mysqli_query($db->conn, "UPDATE person SET user=1 WHERE email = '" . $email . "'")) {
            return "true";
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query related to delete a user
     * @Date : 14/04/2023
     */
    function delete_user($email)
    {
        $db = new DataBase();
        if (mysqli_query($db->conn, "update person SET active_status='inactive' WHERE email = '" . $email . "'")) {
            return "true";
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query related to approve a book request
     * @Date : 14/04/2023
     */
    function approve($bookid, $email)
    {
        $db = new DataBase();
        if (mysqli_query($db->conn, "UPDATE requested_books SET status='Approved' WHERE user_email = '" . $email . "' AND bookid='" . $bookid . "'") && mysqli_query($db->conn, "UPDATE book SET current_quantity=current_quantity-1 WHERE bookid = '" . $bookid . "'")) {
            return "true";
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query related to reject a book request
     * @Date : 14/04/2023
     */
    function reject($bookid, $email)
    {
        $db = new DataBase();
        if (mysqli_query($db->conn, "UPDATE requested_books SET status='Rejected' WHERE user_email = '" . $email . "' AND bookid='" . $bookid . "'")) {
            return "true";
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query related to display all the users
     * @Date : 14/04/2023
     */
    public function users()
    {
        $db = new DataBase();
        $Users = "SELECT * FROM person where user=0 AND active_status='active'";

        if ($result_set = $db->conn->query($Users)) {
            return $result_set;
        } else {
            return "false";
        }
    }
}
?>