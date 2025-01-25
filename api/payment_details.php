<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Card_no = $_POST['Card_no'];
    $Cardholder_name = $_POST['card-name'];
    $Expiration_date = $_POST['expiration'];
    $CVV = $_POST['cvv'];
    $Phone_no = $_POST['Phone_no'];
    $hostname = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'ticket_booking';

    $conn = new mysqli($hostname, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Use placeholders and prepared statement to prevent SQL injection
    $sql = "INSERT INTO payment_info (Phone_no,Card_no,Cardholder_name,CVV,Expiration_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss",$Phone_no, $Card_no, $Cardholder_name, $CVV, $Expiration_date);
    if ($stmt->execute()) {
        echo "Request successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>