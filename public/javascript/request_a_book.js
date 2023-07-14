/*
* @Author : Gourav Tiwari
* @Purpose : To implement function related to make a request to router to request a book by sending bookid using POST method
* @Date : 14/04/2023
*/
function reqbook(bookid) {
    $.ajax({
        type: 'POST',
        url: 'http://localhost/LMS_app/request_a_book/',
        dataType: 'JSON',
        data: { bookid: bookid },
        success: function (data) {
            if (data.result == "true") {
                alert("Book Requested Successfully");
                window.location.href = "http://localhost/LMS_app/all_books"; //redirecting to All Books Page
            }
            else {
                alert("You have already requested this book");
            }
        },
        error: function () {
            alert("something went wrong");
        }

    });
}