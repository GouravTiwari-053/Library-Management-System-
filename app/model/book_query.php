<?php
/* 
 * @Author : Gourav Tiwari
 * @Purpose : To implement and execute queriers related to books
 * @Date : 14/04/2023
 */
class BookModel
{

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to retrive all the books which have quantity is greater than 0
     * @Date : 14/04/2023
     */
    public function all_books_for_user()
    {
        $db = new DataBase();
        $Books = "SELECT * FROM book where current_quantity>0";

        if ($result_set = $db->conn->query($Books)) {
            return $result_set;
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to retrive all the books 
     * @Date : 14/04/2023
     */

    public function all_books_for_admin()
    {
        $db = new DataBase();
        $Books = "SELECT * FROM book";

        if ($result_set = $db->conn->query($Books)) {
            return $result_set;
        } else {
            return "false";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to retrive all the books requested by the users
     * @Date : 14/04/2023
     */
    public function all_users_book_request()
    {
        $db = new DataBase();
        $query = "select rb.bookid as bookid,b.book_name as book_name,b.current_quantity as current_quantity,b.initial_quantity as initial_quantity,rb.user_email as email,rb.requested_time as requested_time,rb.status as status from book b inner join requested_books rb on b.bookid=rb.bookid where status='Pending'";
        if ($result_set = $db->conn->query($query)) {
            return $result_set;
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to request a book
     * @Date : 14/04/2023
     */
    public function request_a_book($bookid)
    {
        $db = new DataBase();
        $sel = "select * from requested_books where bookid='" . $bookid . "' and user_email='" . $_SESSION['email'] . "'";
        $result = mysqli_query($db->conn, $sel);
        if (mysqli_num_rows($result) > 0) {
            return "false";
        } else {
            $sql = "insert into requested_books(bookid,user_email) values ($bookid,'" . $_SESSION['email'] . "')";
            mysqli_query($db->conn, $sql);
            return "true";
        }
    }

    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to retrive all the books requested by the user
     * @Date : 14/04/2023
     */
    public function requested_books($email)
    {
        $db = new DataBase();
        $query = "select b.book_name as book_name,rb.requested_time as requested_time,rb.status as status from book b inner join requested_books rb on b.bookid=rb.bookid where rb.user_email='$email'";
        if ($result_set = $db->conn->query($query)) {
            return $result_set;
        }
    }


    /* 
     * @Author : Gourav Tiwari
     * @Purpose : To implement and execute query to edit a book
     * @Date : 14/04/2023
     */
    public function edit_book($book_name, $author, $initial_quantity, $current_quantity, $bookid)
    {
        $db = new DataBase();
        $update = "UPDATE book set book_name='" . $book_name . "',author='" . $author . "',initial_quantity='" . $initial_quantity . "',current_quantity='" . $current_quantity . "' WHERE bookid='" . $bookid . "'";

        if ($db->conn->query($update)) {
            return "true";
        } else {
            return "false";
        }
    }
}
?>