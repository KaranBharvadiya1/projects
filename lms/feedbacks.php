<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .feedback {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }
        .feedback h2 {
            margin-top: 0;
            color: #333;
        }
        .feedback p {
            margin-bottom: 5px;
        }
        /* .feedback hr {
            border-top: 1px solid #ddd;
            margin-top: 10px;
            margin-bottom: 10px;
        } */
    </style>
</head>
<body>
    <h1>User's Feedback</h1>
    <?php
    include "../signUp-form/conect-login.php";

    $sql = "SELECT * FROM support";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo '<div class="feedback">';
            echo '<h4>Name: ' . $row["name"]. '</h4>';
            echo '<p>Email: ' . $row["email"]. '</p>';
            echo '<p>Message: ' . $row["message"]. '</p>';
            // echo '<hr>';
            echo '</div>'; 
        }
    } else {
        echo "No feedbacks found";
    }
    $conn->close();
    ?>
</body>
</html>
