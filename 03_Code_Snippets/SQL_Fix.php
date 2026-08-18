<?php
// Secure code to prevent SQL Injection
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "dvwa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the safe user ID from the POST request
$user_id = $_POST['user_id'];

// Use a Prepared Statement
$stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE user_id = ?");
$stmt->bind_param("i", $user_id); // "i" means it expects an integer

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "First Name: " . $row["first_name"]. " - Last Name: " . $row["last_name"]. "<br>";
    }
} else {
    echo "0 results";
}

$stmt->close();
$conn->close();
?>