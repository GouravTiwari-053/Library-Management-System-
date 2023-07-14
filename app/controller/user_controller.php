<?php
/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement all the functionalities related to user dashboard
 * @Date : 14/04/2023
 */
class UserController
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To display all available books
     * @Date : 14/04/2023
     */
    public function all_books()
    {
        $BookObject = new BookModel();
        $result = $BookObject->all_books_for_user();
        include ROOT_DIR_VIEW . '\user_dashboard_all_books.php';

    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To request a book
     * @Date : 14/04/2023
     */
    public function request_a_book()
    {
        $object = new BookModel();
        $res = $object->request_a_book($_POST['bookid']);
        return array("result" => $res);

    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To display all the books requested by him/her
     * @Date : 14/04/2023
     */
    public function requested_book()
    {
        $object = new BookModel();
        $res = $object->requested_books($_SESSION['email']);
        if ($result_set = $res) {
            include ROOT_DIR_VIEW . '\requested_books.php';
        }
    }
}


?>