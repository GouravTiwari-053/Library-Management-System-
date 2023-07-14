<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement all books page in admin dashboard
* @Date : 14/04/2023
-->
<html>

<head>
  <link href="http://localhost/LMS_app/public/css/table_css.css" rel="stylesheet">
</head>

<body background-color="#EEFDEF">
  <?php

  include ROOT_DIR_VIEW . '\admin_dashboard.php'; //including a header file of admin deashboard
  echo "<table border='1'>

<tr>

<th>Book Name</th>

<th>Author</th>

<th>Current Quantity</th>

<th>Initial Quantity</th>

</tr>";


  while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //displaying all the fetched books in table format 
  
    echo "<tr>";

    echo "<td>" . $row['book_name'] . "</td>";

    echo "<td>" . $row['author'] . "</td>";

    if ($row['current_quantity'] >= ($row['initial_quantity'] * 50) / 100) { // if current quantity is greater than 50%, change current quantity background to green
      echo "<td bgcolor='green'>" . $row['current_quantity'] . "</td>";
    } else if ($row['current_quantity'] < ($row['initial_quantity'] * 50) / 100 && $row['current_quantity'] > ($row['initial_quantity'] * 20) / 100) { // if current quantity is less than 50% but greater than 20%, change current quantity background to orange
      echo "<td bgcolor='orange'>" . $row['current_quantity'] . "</td>";
    } else { // change current quantity background to red
      echo "<td bgcolor='red'>" . $row['current_quantity'] . "</td>";
    }

    echo "<td>" . $row['initial_quantity'] . "</td>";

    echo "<td><button onclick=get_book_details('" . $row['book_name'] . "','" . $row['author'] . "','" . $row['current_quantity'] . "','" . $row['initial_quantity'] . "','" . $row['bookid'] . "') data-toggle='modal' data-target='#myModal'>Edit Book</button></td>";
    echo "</tr>";
  }

  echo "</table>";
  ?>
  <div class="modal" id="myModal" method="post"> <!-- pop-up modal for edit book details-->
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Book Edit Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="book_name">Book Name</label>
            <input class="form-control" type="text" id="book_name" name="book_name" required maxlength="20">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="author">Author</label>
            <input class="form-control" type="text" id="author" name="author" required>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="current_quantity">Current Quantity</label>
            <input class="form-control" type="number" id="current_quantity" name="current_quantity" required
              maxlength="10">
          </div>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="initial_quantity">Initial Quantity</label>
            <input class="form-control" type="number" id="initial_quantity" name="initial_quantity" required
              maxlength="10">
          </div>
        </div>

        <div class="modal-body" hidden>
          <div class="form-group">
            <label for="bookid"></label>
            <input class="form-control" type="number" id="bookid" name="bookid">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="submit" class="btn btn-primary" onclick=book_edit_form_validation()>Submit</button>

        </div>
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- including book_request_action.js file to run request book function -->
  <script src="http://localhost/LMS_app/public/javascript/book_request_action.js"></script>
</body>

</html>