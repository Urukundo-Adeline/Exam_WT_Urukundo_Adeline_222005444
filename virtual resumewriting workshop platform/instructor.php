<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $bio = $_POST['bio'];
    $expertise = $_POST['expertise'];

    // Database connection parameters
    $servername = "localhost";
    $username = "your_username"; // Replace with your MySQL username
    $password = "your_password"; // Replace with your MySQL password
    $dbname = "virtual_resume_writting_workshops_platform";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO instructors (FullName, Email, Bio, Expertise) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullName, $email, $bio, $expertise);

    // Execute the statement
    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Form</title>
    <style>
        /* Styles remain the same */
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Instructor Registration</h2>
        <?php if (isset($message)) { ?>
            <p id="message"><?php echo $message; ?></p>
        <?php } ?>
        <form id="instructorForm" method="POST" action="">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio" rows="4" required></textarea>

            <label for="expertise">Expertise:</label>
            <input type="text" id="expertise" name="expertise" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('instructorForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('email').value;
            const bio = document.getElementById('bio').value;
            const expertise = document.getElementById('expertise').value;
            
            // Display form data for client-side confirmation
            let message = 'Form submitted successfully. <br>Details:<br>';
            message += `<strong>Full Name:</strong> ${fullName} <br>`;
            message += `<strong>Email:</strong> ${email} <br>`;
            message += `<strong>Bio:</strong> ${bio} <br>`;
            message += `<strong>Expertise:</strong> ${expertise}`;

            document.getElementById('message').innerHTML = message;
        });
    </script>
</body>
</html>
sssss