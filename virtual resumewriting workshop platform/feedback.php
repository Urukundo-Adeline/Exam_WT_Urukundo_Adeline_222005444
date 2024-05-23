<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
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
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        textarea {
            resize: vertical;
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
        <h2>Feedback Form</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database configuration
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "virtual_resume_writting_workshops_platform";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $attendeeId = 1;  // Replace with actual attendee ID
            $workshopId = 1;  // Replace with actual workshop ID
            $instructorId = 1;  // Replace with actual instructor ID
            $rating = 5;  // Replace with actual rating
            $feedbackDate = date('Y-m-d H:i:s');

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO feedback (Attendee_ID, Workshop_ID, Instructor_ID, Rating, Comments, Feedback_Date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiiss", $attendeeId, $workshopId, $instructorId, $rating, $message, $feedbackDate);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<p>Thank you for your feedback!</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }

            // Close connections
            $stmt->close();
            $conn->close();
        }
        ?>
        <form id="feedbackForm" action="" method="post" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <div id="nameError" class="error-message"></div>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <div id="emailError" class="error-message"></div>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <div id="messageError" class="error-message"></div>

            <button type="submit" class="button">Submit</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;

            var nameError = document.getElementById("nameError");
            var emailError = document.getElementById("emailError");
            var messageError = document.getElementById("messageError");

            nameError.innerHTML = "";
            emailError.innerHTML = "";
            messageError.innerHTML = "";

            var isValid = true;

            if (name.trim() === "") {
                nameError.innerHTML = "Please enter your name.";
                isValid = false;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailError.innerHTML = "Please enter a valid email address.";
                isValid = false;
            }

            if (message.trim() === "") {
                messageError.innerHTML = "Please enter your message.";
                isValid = false;
            }

            return isValid;
        }
    </script>
</body>
</html>
