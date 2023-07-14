<?php
/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement redirect(), check_user(),  check_admin(), redirect_to_all_books() and redirect_to_all_users() function
 * @Date : 14/04/2023
 */
class Helper
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To redirect user to all books section and admin to all users section
     * @Date : 14/04/2023
     */
    function redirect()
    {
        if ($this->check_user()) { // if logged in person is user, then redirect him/her to user dashboard all books section
            header("Location:http://localhost/LMS_app/all_books");
            die;
        } else if ($this->check_admin()) { // if logged in person is admin, then redirect him/her to admin dashboard all users section
            header("Location:http://localhost/LMS_app/all_users");
            die;
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To check logged in person is user or not
     * @Date : 14/04/2023
     */
    function check_user()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] == 0) { // if logged in person is user, then redirect him/her to user dashboard all books section
            return true;
        } else
            return false;
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To check logged in person is admin or not
     * @Date : 14/04/2023
     */
    function check_admin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user'] == 1) { // if logged in person is admin, then return true
            return true;
        } else
            return false;
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To redirect user to all books section
     * @Date : 14/04/2023
     */
    function redirect_to_all_books()
    {
        if ($this->check_user()) { // if logged in person is user, then redirect him/her to user dashboard all books section
            header("Location:http://localhost/LMS_app/all_books");
        } else if ($this->check_admin()) {
            header("Location:http://localhost/LMS_app/all_users"); // if logged in person is admin, then redirect him/her to user dashboard all users section
        } else {
            header("Location:http://localhost/LMS_app/login"); //if person is not logged in, redirect him/her to login page
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To redirect admin to all users section
     * @Date : 14/04/2023
     */
    function redirect_to_all_users()
    {
        if ($this->check_admin()) { // if logged in person is admin, then redirect him/her to admin dashboard all users section
            header("Location:http://localhost/LMS_app/all_users");
            if ($this->check_user()) { // if logged in person is user, then redirect him/her to user dashboard all books section
                header("Location:http://localhost/LMS_app/all_books");
            }
        } else {
            header("Location:http://localhost/LMS_app/login"); //if person is not logged in, redirect him/her to login page
        }
    }

}
?>