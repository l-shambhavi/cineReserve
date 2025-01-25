<?php
// Initialize database connection
$hostname = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'ticket_booking';

$conn = new mysqli($hostname, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process seat selection
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_seats'])) {
    $selectedSeats = $_POST['selected_seats'];

    foreach ($selectedSeats as $seat) {
        // You may want to check if the seat is already reserved
        $user_id = 1; // Replace with the actual user ID
        $sql = "INSERT INTO seat (seat_no) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $seat);
        // $sql1 = "INSERT INTO seat (movie) VALUES ('chithha') WHERE seat_no=(?)";
        // $stmt1 = $conn->prepare($sql1);
        // $stmt1->bind_param("s",$seat);

        if ($stmt->execute()) {
            echo "Seat $seat selected successfully!";
        } else {
            echo "Error selecting seat $seat: " . $stmt->error;
        }
        // if ($stmt1->execute()) {
        //     echo "Seat $seat selected successfully!";
        // } else {
        //     echo "Error selecting seat $seat: " . $stmt1->error;
        // }
    }

    // Close the database connection
    $conn->close();
}
?>
