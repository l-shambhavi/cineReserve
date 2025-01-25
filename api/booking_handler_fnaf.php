<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Movie_name = "five nights at freddy's";
    $Screen_no = "3";
    $Date = $_POST['bookingDate'];
    $Seats = intval($_POST['numTickets']);
    $Showtime = $_POST['showtime'];
    $Theater = $_POST['theater'];

    $hostname = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'ticket_booking';

    $conn = new mysqli($hostname, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Use placeholders and prepared statement to prevent SQL injection
    $sql = "INSERT INTO ticket (Date, Showtime, Theater, Seats, Movie_name, Screen_no) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiss", $Date, $Showtime, $Theater, $Seats, $Movie_name, $Screen_no);


    if ($stmt->execute()) {
        echo "Request successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
