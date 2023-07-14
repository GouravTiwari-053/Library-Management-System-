<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement requested books page for user dashboard
* @Date : 14/04/2023
-->
<!DOCTYPE html>

<head>
  <link href="http://localhost/LMS_app/public/css/table_css.css" rel="stylesheet">
  <p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
</head>

<body background-color="#EEFDEF">
<p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
  <?php

  include ROOT_DIR_VIEW . '\user_dashboard.php'; //including a header file of user dashboard
  echo "<table border='1'>

<tr>

<th>Book Name</th>

<th>Requested Time</th>

<th>Status</th>

</tr>";

  while ($row = $result_set->fetch_array(MYSQLI_ASSOC)) { //display all book name,requested_time and status of a book requested by user in table format
  
    echo "<tr>";

    echo "<td>" . $row['book_name'] . "</td>";

    echo "<td>" . $row['requested_time'] . "</td>";

    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";

  }

  echo "</table>";
  ?>
</body>

</html>