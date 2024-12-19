<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Library</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    .search-container {
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
    }
    .search-container input[type=text] {
        padding: 10px;
        margin-right: 10px;
        width: 300px;
        border-radius: 8px;
    }
    .search-container button {
        padding: 10px 20px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }



  .back-btn{
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 10px;
    left: 40px;
    height: 30px;
    width: 90px;
    font-weight: 800;
    background: #000;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
  }
  .back-btn:hover{
    background-color: lightblue;
    color: #000;
  }

</style>
</head>
<body>

<a href="index.php" class="back-btn">←</a>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by title...">
    <button onclick="searchBooks()">Search</button>
</div>

<table id="bookTable">
    <tr>
        <th>id</th>
        <th>Image</th>
        <th>Title</th>
        <th>Author</th>
    </tr>
    <?php
    // Database connection
    // $conn = mysqli_connect("localhost", "username", "password", "database_name");
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }

    include "../signUp-form/conect-login.php";

    // Fetching data from database
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><img src='" . $row['image'] . "'></td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "</tr>";
        }
    }
    $conn->close();


   
    
 
  
    ?>
    





</table>

<script>
    function searchBooks() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("bookTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those that don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Index 2 corresponds to the title column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

</script>

</body>
</html>
