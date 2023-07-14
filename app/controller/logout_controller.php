<?php
/* 
 * @Author : Gourav Tiwari
 * @Purpose : to implement logout functionality
 * @Date : 14/04/2023
 */
class LogoutController
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : to logout the user/admin and destroy the user session
     * @Date : 14/04/2023
     */
    function __construct()
    {
        session_destroy();
        header("Location:http://localhost/LMS_app/login"); //redirecting to login page
        exit;
    }
}
?>