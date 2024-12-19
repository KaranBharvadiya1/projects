<?php
include "../signUp-form/conect-login.php";

if(isset($_POST['book_id'])) {
    $bookId = $_POST['book_id'];
    
    $sql = "SELECT title FROM books WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $bookId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(array('title' => $row['title']));
    } else {
        echo json_encode(array('title' => 'Title not found'));
    }
}
$conn->close();
?>
