<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process payment information here (you should integrate with a payment gateway API)

    // For this example, we'll simulate a successful payment
    $paymentStatus = "Success"; // Replace with the actual payment processing logic

    if ($paymentStatus === "Success") {
        // Payment successful
        echo "<h2>Payment Successful</h2>";
        echo "<p>Thank you for your payment.</p>";
    } else {
        // Payment failed
        echo "<h2>Payment Failed</h2>";
        echo "<p>Payment processing failed. Please try again.</p>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <link rel="stylesheet" href="payment_gateway.css">
    <style>
        /* Global styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Updated background color */
        }

        header {
            background-color: #333; /* Updated header background color */
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        section {
            max-width: 800px; /* Increased max-width */
            margin: 0 auto;
            padding: 40px; /* Increased padding */
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h1 {
            font-size: 32px;
            margin: 0;
            color: #ff1d58; /* Header text color */
        }

        h2 {
            font-size: 24px;
            margin-top: 0;
            color: #c5b8ac; /* Subsection headings color */
        }

        form {
            text-align: center;
            margin: 20px 0;
        }

        label {
            font-weight: bold;
            color: #333; /* Label text color */
        }

        input[type="date"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0; /* Increased margin */
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        a {
            background-color: #ff1d58; /* Submit button background color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        a:hover {
            background-color: #ff0072; /* Hover color for the submit button */
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Payment Gateway</h1>
        <form action="payment_details.php" method="post" >
        <div>
            <label for="Phone_no">Phone number:</label>
            <input type="number" id="Phone_no" name="Phone_no" required>
        </div>
        <div>
            <label for="card-number">Card Number:</label>
            <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" required>
        </div>
        <div>
            <label for="card-name">Cardholder Name:</label>
            <input type="text" id="card-name" name="card-name" placeholder="John Doe" required>
        </div>
            <div class="expiration-cvv">
                <div>
                    <label for="expiration">Expiration Date:</label>
                    <input type="text" id="expiration" name="expiration" placeholder="MM/YY" required>
                </div>
                <div>
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" placeholder="123" required>
                </div>
            </div>

            <input type="submit" value="Confirm payment">
            <a href="payment_gateway.html" id="link-button">Confirm payment</a>
        </form>
    </div>
</body>
</html>
