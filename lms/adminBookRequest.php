<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Requests</title>
    <style>
        
        .book-requests {
            width: 100%;
            border-collapse: collapse;
        }

        .book-requests th, .book-requests td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .book-requests th {
            background-color: #f2f2f2;
        }

        .book-requests tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .book-requests tr:hover {
            background-color: #f2f2f2;
        }

        .accept-btn,.delete-btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 3px;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #f44336;
        }
    </style>
</head>
<body>
<?php
include "../signUp-form/conect-login.php";



$sql = "SELECT * FROM book_requests";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    echo '<table class="book-requests">';
    echo '<tr>';
    echo '<th>Student Name</th>';
    echo '<th>Student Email</th>';
    echo '<th>Book ID</th>';
    echo '<th>Book Name</th>';
    echo '<th>Issue Date</th>';
    echo '<th>Action</th>'; 
    echo '<th>Status</th>'; 
    echo '</tr>';
    while($row = $result->fetch_assoc()) {
        echo '<tr id="row-' . $row["id"] . '">'; 
        echo '<td>' . $row["student_name"] . '</td>';
        echo '<td>' . $row["student_email"] . '</td>';
        echo '<td>' . $row["book_id"] . '</td>';
        echo '<td>' . $row["book_name"] . '</td>';
        echo '<td>' . $row["issue_date"] . '</td>';
       
        echo '<td>';
        echo '<button class="accept-btn" onclick="acceptRequest(' . $row["id"] . ')">Accept</button>';
        echo '<button class="delete-btn" onclick="deleteRequest(' . $row["id"] . ')">Delete</button>';
        echo '</td>';
        echo '<td class="action-cell">';
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No book requests found";
}
$conn->close();
?>

<script>
    function acceptRequest(id) {
        var row = document.getElementById('row-' + id);
        var actionCell = row.querySelector('.action-cell'); 
        actionCell.innerHTML = 'Accepted'; // Replace action buttons with "Accepted" text
        // Save the accepted request ID in local storage
        var acceptedRequests = JSON.parse(localStorage.getItem('acceptedRequests')) || [];
        acceptedRequests.push(id);
        localStorage.setItem('acceptedRequests', JSON.stringify(acceptedRequests));
    }

    function deleteRequest(id) {
        var row = document.getElementById('row-' + id);
        row.parentNode.removeChild(row); // Remove the row from the table
        // You can also send an AJAX request to delete the row from the database here (optional)
    }
</script>



</body>
</html>
