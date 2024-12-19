<?php
include "../signUp-form/conect-login.php";

$countQuery = "SELECT COUNT(*) AS total_rows FROM signup";
$result = $conn->query($countQuery);
$row = $result->fetch_assoc();
$count = $row["total_rows"];


$countQuery1 = "SELECT COUNT(*) AS total_books FROM books";
$result1 = $conn->query($countQuery1);
$row1 = $result1->fetch_assoc();
$count1 = $row1["total_books"];


$countQuery2 = "SELECT COUNT(*) AS total_issue FROM book_requests";
$result2 = $conn->query($countQuery2);
$row2 = $result2->fetch_assoc();
$count2 = $row2["total_issue"];



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <title>Admin</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>

<nav class="navbar">
  <ul>
    <li><a href="#" style="color: lightblue;">Home</a></li>
    <li><a href="adminBookRequest.php">Request</a></li>
    <li><a href="feedbacks.php">Feedbacks</a></li>
    <li><a href="addBook.php">Add Book</a></li>
  </ul>
</nav>

<section class="home-section">
  <div class="upper-cards">
    <div class="card">
      <h2>Registered Users</h2>
      <p class="quantity"><?php 
      echo $count;
      ?></p>
    </div>
    <div class="card">
      <h2>Total Books</h2>
      <p class="quantity"><?php 
      echo $count1;
      ?></p></p>
    </div>
  </div>
  <div class="lower-cards">
    <div class="card">
      <h2>Books Issued</h2>
      <p class="quantity"><?php 
      echo $count2;
      ?></p>
    </div>
    <div class="card">
      <h2>Books not Returned</h2>
      <p class="quantity"><?php 
      echo $count2;
      ?></p>
    </div>
  </div>
</section>

</body>
</html>
