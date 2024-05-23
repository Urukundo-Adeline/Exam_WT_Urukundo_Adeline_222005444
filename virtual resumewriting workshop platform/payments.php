<?php
// Your PHP code here for handling the form submission, database operations, etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Form</h2>
        <form id="paymentForm" action="process_payment.php" method="post" onsubmit="return validateForm()">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter your card number" required>
            <div id="cardNumberError" class="error-message"></div>

            <label for="cardName">Cardholder Name:</label>
            <input type="text" id="cardName" name="cardName" placeholder="Enter cardholder name" required>
            <div id="cardNameError" class="error-message"></div>

            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
            <div id="expiryDateError" class="error-message"></div>

            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv" placeholder="Enter CVV" required>
            <div id="cvvError" class="error-message"></div>

            <button type="submit" class="button">Pay Now</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var cardNumber = document.getElementById("cardNumber").value;
            var cardName = document.getElementById("cardName").value;
            var expiryDate = document.getElementById("expiryDate").value;
            var cvv = document.getElementById("cvv").value;

            var cardNumberError = document.getElementById("cardNumberError");
            var cardNameError = document.getElementById("cardNameError");
            var expiryDateError = document.getElementById("expiryDateError");
            var cvvError = document.getElementById("cvvError");

            cardNumberError.innerHTML = "";
            cardNameError.innerHTML = "";
            expiryDateError.innerHTML = "";
            cvvError.innerHTML = "";

            var isValid = true;

            // Card number validation
            if (cardNumber.trim() === "" || isNaN(cardNumber) || cardNumber.length !== 16) {
                cardNumberError.innerHTML = "Please enter a valid 16-digit card number.";
                isValid = false;
            }

            // Cardholder name validation
            if (cardName.trim() === "") {
                cardNameError.innerHTML = "Please enter the cardholder name.";
                isValid = false;
            }

            // Expiry date validation
            if (expiryDate.trim() === "" || !/^\d{2}\/\d{2}$/.test(expiryDate)) {
                expiryDateError.innerHTML = "Please enter a valid expiry date (MM/YY format).";
                isValid = false;
            }

            // CVV validation
            if (cvv.trim() === "" || isNaN(cvv) || cvv.length !== 3) {
                cvvError.innerHTML = "Please enter a valid 3-digit CVV.";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>
