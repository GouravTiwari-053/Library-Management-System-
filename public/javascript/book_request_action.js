/*
* @Author : Gourav Tiwari
* @Purpose : To implement functions related to approve a book, reject a book, get book details, edit book
* @Date : 14/04/2023
*/


/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to make a request to router for approve a book by sending bookid and email using POST method
* @Date : 14/04/2023
*/

function approve(bid, eml) {

    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/approve',
        dataType: 'JSON',
        data: { bid: bid, eml: eml },
        success: function (data) {
            window.location.href = "http://localhost/LMS_app/all_user_book_request"; //redirecting to Book Request page 
        },
        error: function () {
            alert("something went wrong");
        }

    });
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to make a request to router for reject a book request by sending bookid and email using POST method
* @Date : 14/04/2023
*/
function reject(bid, eml) {

    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/reject',
        dataType: 'JSON',
        data: { bid: bid, eml: eml },
        success: function (data) {
            window.location.href = "http://localhost/LMS_app/all_user_book_request";  //redirecting to Book Request page 
        },
        error: function () {
            alert("something went wrong");
        }

    });
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to to get book details in edit form
* @Date : 14/04/2023
*/
function get_book_details(book_name, author, current_quantity, initial_quantity, bookid) {
    $('#book_name').val(book_name);
    $('#bookid').val(bookid);
    $('#author').val(author);
    $('#current_quantity').val(current_quantity);
    $('#initial_quantity').val(initial_quantity);
    $('#myModal').modal('show');
}

/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related validate book details and make a request to router for edit book details 
* @Date : 14/04/2023
*/
function book_edit_form_validation() {

    var book_name = $("#book_name").val();
    var author = $("#author").val();
    var current_quantity = $("#current_quantity").val();
    var initial_quantity = $("#initial_quantity").val();
    var bookid = $("#bookid").val();
    current_quantity = parseInt(current_quantity);
    initial_quantity = parseInt(initial_quantity);
    var bk_name = /^[ A-Za-z0-9_@.#&+-]*$/;   // regax expression for book name
    var auth = /^[a-zA-Z]*$/;   // regax expression for author name 
    if (!bk_name.test(book_name) || book_name.length < 1 || book_name.length > 30) { // validating book name
        alert("Book length should be in between 1 to 30");
        return false;
    }

    if (!auth.test(author) || author.length < 1 || author.length > 30) { // validating author name
        alert("Enter Author Name in alphabets only without any whitespace and length should be in between 3 to 30");
        return false;
    }

    if (current_quantity > initial_quantity || current_quantity < 0) {  // validating current quantity
        alert("Please Enter a Positive Quantity and Current Quantity should be less than or equal to Initial Quantity");
        return false;
    }

    if (initial_quantity < 0 || initial_quantity > 10000) { //validating initial quantity
        alert("Please Enter a Positive Quantity and  Initial Quantity should be less than or equal to 10000");
        return false;
    }
    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/edit_book',
        dataType: 'JSON',
        data: { book_name: book_name, author: author, current_quantity: current_quantity, initial_quantity: initial_quantity, bookid: bookid },
        success: function (data) {
            if (data == "true") {
                window.location.href = "http://localhost/LMS_app/all_books"; // redirecting to all books page 
            }
        },
        error: function () {  //error function
            alert("Something Went Wrong");
        }
    });
}