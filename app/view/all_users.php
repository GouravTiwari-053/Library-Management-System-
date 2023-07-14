<!-- 
* @Author : Gourav Tiwari
* @Purpose : To implement all users page for admin dashboard
* @Date : 14/04/2023
-->
<html>

<head>
  <link href="http://localhost/LMS_app/public/css/table_css.css" rel="stylesheet">
  <p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
</head>

<body background-color="#EEFDEF">
<p style="background-image: url('http://localhost/LMS_app/public/img/books.jpg');">
  <?php

  include ROOT_DIR_VIEW . '\admin_dashboard.php'; //adding header file of admin dashboard
  echo "<table border='1'>

<tr>

<th>First Name</th>

<th>Last Name</th>

<th>User Name</th>

<th>Email</th>

<th>Mobile No</th>

<th>Age</th>

<th>Designation</th>

</tr>";


  while ($row = $result->fetch_array(MYSQLI_ASSOC)) { //display all the fetched users in table format 
  
    echo "<td>" . $row['first_name'] . "</td>";

    echo "<td>" . $row['last_name'] . "</td>";

    echo "<td>" . $row['user_name'] . "</td>";

    echo "<td>" . $row['email'] . "</td>";

    echo "<td>" . $row['mobile'] . "</td>";

    echo "<td>" . $row['age'] . "</td>";

    echo "<td>" . $row['designation'] . "</td>";

    echo "<td><button onclick=getuserdetails('" . $row['first_name'] . "','" . $row['last_name'] . "','" . $row['user_name'] . "','" . $row['email'] . "','" . $row['password'] . "','" . $row['mobile'] . "','" . $row['age'] . "','" . $row['designation'] . "') data-toggle='modal' data-target='#myModal'>Edit User</button></td>"; //edit user button
    echo "<td><button onclick=make_admin('" . $row['email'] . "')>Make Admin</button></td>"; //Make Admin button
    echo "<td><button onclick=delete_user('" . $row['email'] . "')>Delete User</button></td>"; //Delete User button
  
    echo "</tr>";
  }
  echo "</table>";
  ?>

  <div class="modal" id="myModal" method="post"> <!-- pop-up modal for edit user details-->
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input class="form-control" type="text" id="first_name" name="first_name" required maxlength="20">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input class="form-control" type="text" id="last_name" name="last_name" required maxlength="20">
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="user_id">User ID</label>
            <input class="form-control" type="text" id="user_id" name="user_id" maxlength="15" required>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="text" id="email" name="email" required>
          </div>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="mobile">Mobile</label>
            <input class="form-control" type="text" id="mobile" name="mobile" required maxlength="10">
          </div>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="age">Age</label>
            <input class="form-control" type="number" id="age" name="age" required maxlength="3">
          </div>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="designation">Designation</label>
            <input class="form-control" type="text" id="designation" name="designation" required maxlength="15">
          </div>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" required maxlength="15">
          </div>
        </div>
        <div class="modal-body" hidden>
          <div class="form-group">
            <label for="Email">Email</label>
            <input class="form-control" type="text" id="Email" name="Email">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="submit" class="btn btn-primary" onclick=edit_form_validation()>Submit</button>

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
  <!-- including modify_user.js file to call edit user, make admin, delete user function-->
  <script src="http://localhost/LMS_app/public/javascript/modify_user.js"></script>

</body>

</html>