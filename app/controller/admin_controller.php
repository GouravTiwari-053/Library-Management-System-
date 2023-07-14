<?php
/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement all the functionalities related to admin dashboard
 * @Date : 14/04/2023
 */
class AdminController
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To display all the users
     * @Date : 14/04/2023
     */
    public function all_users()
    {
        $UserObject = new AdminModel();
        $result = $UserObject->users();
        include ROOT_DIR_VIEW . '\all_users.php';
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To display all books requested by users
     * @Date : 14/04/2023
     */
    public function all_books_request()
    {
        $Req_Obj = new BookModel();
        $ans = $Req_Obj->all_users_book_request();
        include ROOT_DIR_VIEW . '\user_book_request.php';
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To change a user into an admin
     * @Date : 14/04/2023
     */
    public function make_admin($email)
    {
        $obj = new AdminModel();
        $result = $obj->make_admin($email);
        return array("result" => $result);
    }


    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To edit user details
     * @Date : 14/04/2023
     */
    public function edit_user($first_name, $last_name, $user_id, $email, $password, $mobile, $age, $designation, $Email)
    {

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (!preg_match('/[a-zA-Z]{3,20}$/', $first_name) || !preg_match('/[a-zA-Z]{3,20}$/', $last_name) || !preg_match('/[a-zA-Z]{3,15}$/', $designation)) { //validating first name, last name and designation

            return array("false");
        }
        if ($age < 5 || $age > 100) { // validating age of a user
            return array("false");
        }
        if (!preg_match('/^[a-zA-Z0-9]{5,15}$/', $user_id)) { //validating user id
            return array("false");
        }
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 7 || strlen($password) > 15) { //validating password
            return array("false");
        }
        if (!preg_match('/^[6-9][0-9]{9}$/', $mobile)) { //validating mobile number

            return array("false");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //validating email id
            return array("false");
        }
        $obj = new AdminModel();
        $result = $obj->edit_user($first_name, $last_name, $user_id, $email, $password, $mobile, $age, $designation, $Email);
        return array($result);

    }


    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To delete a user
     * @Date : 14/04/2023
     */
    public function delete_user($email)
    {
        $obj = new AdminModel();
        $result = $obj->delete_user($email);
        return array("result" => $result);
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To Approve a book request
     * @Date : 14/04/2023
     */
    public function approve($bookid, $email)
    {
        $obj = new AdminModel();
        $result = $obj->approve($bookid, $email);
        return array("result" => $result);
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To reject a book request
     * @Date : 14/04/2023
     */
    public function reject($bookid, $email)
    {
        $obj = new AdminModel();
        $result = $obj->reject($bookid, $email);
        return array("result" => $result);
    }


    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To display all the books
     * @Date : 14/04/2023
     */
    public function all_books()
    {
        
        $BookObject = new BookModel();
        $result = $BookObject->all_books_for_admin();
        include ROOT_DIR_VIEW . '\admin_dashboard_all_books.php';

    }


    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To edit book details
     * @Date : 14/04/2023
     */
    public function edit_book($book_name, $author, $initial_quantity, $current_quantity, $bookid) //function to edit a user
    {
        if (!preg_match('/^[ A-Za-z0-9_@.#&+-]*$/', $book_name) || strlen($book_name) < 1 || strlen($book_name) > 30) { //validating first name, last name and designation

            return array("false");
        }
        if (!preg_match('/^[a-zA-Z]*$/', $author) || strlen($author) < 3 || strlen($author) > 30) { //validating first name, last name and designation

            return array("false");
        }
        if ($current_quantity > $initial_quantity || $current_quantity < 0 || $initial_quantity < 0 || $initial_quantity > 10000) { // validating age of a user
            return array("false");
        }
        
        $obj = new BookModel();
        $result = $obj->edit_book($book_name, $author, $initial_quantity, $current_quantity, $bookid);
        return array($result);
    }

}
?>