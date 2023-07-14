<?php

/* 
 * @Author : Gourav Tiwari
 * @Purpose : To handle all the server request
 * @Date : 14/04/2023
 */
class Router
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement all the action related to server request
     * @Date : 14/04/2023
     */
    function __construct()
    {
        $helper_object = new Helper();
        $request = $_SERVER['REQUEST_URI']; //variable to store Server Request
        $arr = explode("/", $request); // Explode a request by separating it with /

        switch ($arr[2]) {
            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle the request for login
             * @Date : 14/04/2023
             */
            case 'login':
                $object = new LoginController();
                if (!empty($_POST)) { //checking POST method is empty or not
                    $result = $object->login_action();
                    echo json_encode($result);
                } else {
                    $helper_object->redirect();
                    $loginView = $object->login_view();
                    echo $loginView;
                }
                break;
            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle the request for signup
             * @Date : 14/04/2023
             */
            case 'signup':
                $object = new SignupController();
                if (!empty($_POST)) { //checking POST method is empty or not
                    $result = $object->signup_action();
                    echo json_encode($result);
                } else {
                    $helper_object->redirect();
                    $signUpView = $object->signup_view();
                    echo $signUpView;
                }
                break;
            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request for logout
             * @Date : 14/04/2023
             */
            case 'logout':
                new LogoutController();
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request for all the books
             * @Date : 14/04/2023
             */
            case 'all_books':
                if ($helper_object->check_user()) { // if logged in person is user, then redirect him/her to user dashboard all books section
                    $obj = new UserController();
                    $obj->all_books();
                } else if ($helper_object->check_admin()) { // if logged in person is admin, then redirect him/her to admin dashboard all books section
                    $obj = new AdminController();
                    $obj->all_books();
                } else {
                    header("Location:http://localhost/LMS_app/login"); //if person is not logged in, redirect him/her to login page
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request for request a book
             * @Date : 14/04/2023
             */
            case 'request_a_book':
                if (!empty($_POST) && $helper_object->check_user()) { // if logged in person is user, then proceed to request a book
                    $obj = new UserController();
                    $res = $obj->request_a_book();
                    echo json_encode($res);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request for all requested books
             * @Date : 14/04/2023
             */
            case 'requested_book':
                if ($helper_object->check_user()) { // if logged in person is user, then proceed for requested books
                    $obj = new UserController();
                    $obj->requested_book();
                } else {
                    $helper_object->redirect_to_all_users();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to dispay all the users
             * @Date : 14/04/2023
             */
            case 'all_users':
                if ($helper_object->check_admin()) { // if logged in person is admin, then proceed to display all the users
                    $obj = new AdminController();
                    $obj->all_users();
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request for all users book request
             * @Date : 14/04/2023
             */
            case 'all_user_book_request':
                if ($helper_object->check_admin()) { // if logged in person is admin, then proceed to display all users book request
                    $object = new AdminController();
                    $object->all_books_request();
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to edit a user
             * @Date : 14/04/2023
             */
            case 'edit_user':
                if (!empty($_POST) && $helper_object->check_admin()) {
                    $object = new AdminController();
                    $result = $object->edit_user($_POST['first_name'], $_POST['last_name'], $_POST['user_id'], $_POST['email'], $_POST['password'], $_POST['mobile'], $_POST['age'], $_POST['designation'], $_POST['Email']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to change a user into admin
             * @Date : 14/04/2023
             */
            case 'make_admin':
                if (!empty($_POST) && $helper_object->check_admin()) { // if logged in person is admin, then proceed to change a user into admin
                    $object = new AdminController();
                    $result = $object->make_admin($_POST['Email']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to delete a user
             * @Date : 14/04/2023
             */
            case 'delete_user':
                if (!empty($_POST) && $helper_object->check_admin()) { // if logged in person is admin, then proceed to delete a user
                    $object = new AdminController();
                    $result = $object->delete_user($_POST['Email']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to approve a book request
             * @Date : 14/04/2023
             */
            case 'approve':
                if (!empty($_POST) && $helper_object->check_admin()) { // if logged in person is admin, then proceed to approve a book request
                    $object = new AdminController();
                    $result = $object->approve($_POST['bid'], $_POST['eml']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to reject a book request
             * @Date : 14/04/2023
             */
            case 'reject':
                if (!empty($_POST) && $helper_object->check_admin()) { // if logged in person is admin, then proceed to reject a book request
                    $object = new AdminController();
                    $result = $object->reject($_POST['bid'], $_POST['eml']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle request to edit a user
             * @Date : 14/04/2023
             */
            case 'edit_book':
                if (!empty($_POST) && $helper_object->check_admin()) { // if logged in person is admin, then proceed to edit a user
                    $object = new AdminController();
                    $result = $object->edit_book($_POST['book_name'], $_POST['author'], $_POST['initial_quantity'], $_POST['current_quantity'], $_POST['bookid']);
                    echo json_encode($result);
                } else {
                    $helper_object->redirect_to_all_books();
                }
                break;

            /* 
             * @Author : Gourav Tiwari
             * @Purpose : To handle default request
             * @Date : 14/04/2023
             */

            default:
                $helper_object->redirect();
                include ROOT_DIR . '\view\login.php';
                break;
        }

        /* 
         * @Author : Gourav Tiwari
         * @Purpose : To include index file 
         * @Date : 14/04/2023
         */
        function __destruct()
        {

            include index;
        }
    }

}
?>