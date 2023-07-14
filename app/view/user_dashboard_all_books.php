<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement all books page in admin dashboard
* @Date : 14/04/2023
-->
<!DOCTYPE html>

<head>
  <link href="http://localhost/LMS_app/public/css/table_css.css" rel="stylesheet">
</head>

<body background-color="#EEFDEF">

  <?php

  include ROOT_DIR_VIEW . '\user_dashboard.php'; //including a header file of user deashboard
  echo "<table border='1'>";
?>
<tr>

<th>Book Name</th>

<th>Author</th>

<th>Quantity</th>

</tr>
<?php

  while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //displaying all the fetched books in table format 
  
    echo "<tr>";

    echo "<td>" . $row['book_name'] . "</td>";

    echo "<td>" . $row['author'] . "</td>";

    echo "<td>" . $row['current_quantity'] . "</td>";

    echo "<td><button onclick=reqbook(" . $row['bookid'] . ")>Request Book</button></td>"; //button to request a book
    echo "</tr>";

  }

  echo "</table>";
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- including request_a_book.js file to run request book function -->
  <script src="http://localhost/LMS_app/public/javascript/request_a_book.js"></script>

</body>

</html>