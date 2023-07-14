<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement book requested by user page in admin dashboard
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

  include ROOT_DIR_VIEW . '\admin_dashboard.php'; // including a head file of admin dashboard
  echo "<table border='1'>

<tr>

<th>Book Name</th>

<th>Current Quantity</th> 

<th>Initial Quantity</th> 

<th>User Email</th>

<th>Request Time</th>

</tr>";


  while ($row = $ans->fetch_array(MYSQLI_ASSOC)) { // display book name, user email and requested time in table format
  
    echo "<tr>";

    echo "<td>" . $row['book_name'] . "</td>";

    if ($row['current_quantity'] >= ($row['initial_quantity'] * 50) / 100) { // if current quantity is greater than 50%, change current quantity background to green
      echo "<td bgcolor='green'>" . $row['current_quantity'] . "</td>";
    } else if ($row['current_quantity'] < ($row['initial_quantity'] * 50) / 100 && $row['current_quantity'] > ($row['initial_quantity'] * 20) / 100) { // if current quantity is less than 50% but greater than 20%, change current quantity background to orange
      echo "<td bgcolor='orange'>" . $row['current_quantity'] . "</td>";
    } else { // change current quantity background to red
      echo "<td bgcolor='red'>" . $row['current_quantity'] . "</td>";
    }
    echo "<td>" . $row['initial_quantity'] . "</td>";

    echo "<td>" . $row['email'] . "</td>";

    echo "<td>" . $row['requested_time'] . "</td>";

    echo "<td><button onclick=approve('" . $row['bookid'] . "','" . $row['email'] . "')>Approve</button></td>"; // button to approve a book
  
    echo "<td><button onclick=reject('" . $row['bookid'] . "','" . $row['email'] . "')>Reject</button></td>"; // button to reject a book request
  
    echo "</tr>";

  }

  echo "</table>";
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- including book_request_action.js file to run javascript function and ajax call-->
  <script src="http://localhost/LMS_app/public/javascript/book_request_action.js"></script>

</body>

</html>