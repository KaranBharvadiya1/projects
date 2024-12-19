<?php
include "../signUp-form/conect-login.php";

  $name1 = $_SESSION['email'];
  $query1 = "SELECT * FROM signup WHERE email='$name1'";
  $result1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_assoc($result1);



  $query9 = "SELECT COUNT(*) AS total FROM book_requests WHERE student_email='$name1'";
  $result9 = mysqli_query($conn, $query9);
  $row9 = mysqli_fetch_assoc($result9);

         
        
        

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  
  
</head>
<body>
  <div class="main">

    <nav class="navbar">
      <img src="logo/LMS-logo.png" class="logo" alt=""><h1 style = "color: white;">LMS</h1>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="bookSearch.php">Resources</a></li>
        <li><a href="announcements.html">Announcements</a></li>
        <li><a href="support.html">Support & Help</a></li>
      </ul>
      <img src="logo/user-pic.png" class="user-pic" onClick="openMenu()" alt="">

      <div class="user-menu-wrap" id="subMenu">
        <div class="user-menu">
          <div class="user-info">
            <img src="logo/user-pic.png" alt="">
            <h4 style="text-transform: capitalize">
            <?php
            echo $row1['username'];
            ?>
            </h4>
          </div>
          <hr>
          <!-- <a href="#" class="user-menu-link">
            <img src="logo/icons8-user-48.png" alt="">
            <p>Edit Profile</p>
            <span>></span>
          </a> -->
          <!-- <a href="#" class="user-menu-link">
            <img src="logo/icons8-setting-48.png" alt="">
            <p>Setting & Privacy</p>
            <span>></span>
          </a>
          <a href="#" class="user-menu-link">
            <img src="logo/icons8-about-48.png" alt="">
            <p>About As</p>
            <span>></span>
          </a> -->
          <!-- <a href="#" class="user-menu-link">
            <img src="logo/icons8-night-mode-48.png" alt="">
            <p>Dark Mode</p>
            <span>></span>
          </a> -->
          <a href="../signUp-form/login.php" class="user-menu-link" id="logout" onclick="
          alert('Are you sure to Logout');
          
          ">
            <img src="logo/icons8-log-out-48.png" alt="">
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div>
    </nav>
    <div class="suport" id="suport"></div>
  </div>



  <div class="paragraph-container">
    <div class="container1" style="text-align: center;">
        <h1 style="margin-bottom: 20px;">Welcome to Our Library!</h1>
        <p>Unlock the doors to knowledge, adventure, and imagination.</p>
        <div class="paragraph">
          <p>Explore our collection of books and issue your favorites today !</p>
        </div>
    </div>
    <!-- <div class="paragraph">
      <p>Don't forget to return the books on time to avoid late fees.</p>
    </div> -->
  </div>
  <div class="container">
      <div class="form-container">
      <form action="../signUp-form/bookRequest.php" method="POST">
        <div class="form-group">
          <label for="student-name">Student Name:</label>
          <input type="text" id="student-name" name="student_name" required>
        </div>
        <div class="form-group">
          <label for="student-email">Student Email:</label>
          <input type="email" id="student-email" name="student_email" required>
        </div>
        <div class="form-group">
          <label for="book-id">Book id :</label>
          <?php
          

          $sql7 = "SELECT id, title FROM books"; 
          $result7 = $conn->query($sql7);

          if ($result7->num_rows > 0) {
              echo "<select name='book_id' id='book_id'>";
              echo "<option value=''>Select a book code</option>"; 

              while ($row7 = $result7->fetch_assoc()) {
                  echo "<option value='" . $row7['id'] . "'>" . $row7['id'] . "</option>";
              }
              echo "</select>";
          } else {
              echo "0 results"; 
          }
          ?>
      </div>
        
         <div class="form-group">
          <label for="book-name">Book Name:</label>
          <input type="text" id="book-name" name="book_name" required>
        </div>
        <div class="form-group">
          <label for="issue-date">Issue Date:</label>
          <input type="date" id="issue-date" name="issue_date" required>
        </div>
        <button type="submit" class="btn" onclick="
        alert('Book request successfully send to admin');
        ">Request</button>
      </form>
    </div>

    <div class="card-container">
      <div class="card">
        <h2>Your Issued Books</h2>
        <p style = "font-size: 25px;"><b>&nbsp; &nbsp; &nbsp; <?php
            echo $row9['total'];
            ?></p></b> 
      </div>
      <div class="card">
        <h2>Books Not Returned</h2>
        <p style = "font-size: 25px;"> <b> &nbsp; &nbsp; &nbsp;<?php
            echo $row9['total'];
            ?></p></b>
      </div>
    </div>
  </div>
  <div class="paragraph">
      <p><marquee behavior="" direction="">Don't forget to return the books on time to avoid late fees.</marquee></p>
  </div>
  <footer>
    &copy; 2024 Library Management System GEC Rajkot. All Rights Reserved.
  </footer>


  <script src="index.js"></script>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#book_id').change(function(){
        var bookId = $(this).val();
        $.ajax({
            url: 'get_book_name.php', // PHP file to fetch the book name based on ID
            type: 'POST',
            data: {book_id: bookId},
            dataType: 'json',
            success:function(response){
                $('#book-name').val(response.title);
            }
        });
    });
});
</script>



</body>
</html>