<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user details from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // You should validate and sanitize user inputs here

    // Connect to your database (replace with your database credentials)
    $hostname = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'ticket_booking';

    $conn = new mysqli($hostname, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert user details into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
