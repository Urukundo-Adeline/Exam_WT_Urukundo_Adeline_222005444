<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Workshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        .button {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .success-message {
            color: green;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
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
        <h2>Submit Workshop</h2>
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
            $title = $_POST['workshopTitle'];
            $date = $_POST['date'];
            $description = $_POST['description'];
            $link = $_POST['link'];
            $instructorId = 1;  // Replace with actual instructor ID
            $startDate = $date;
            $endDate = $date;
            $price = 0.00;  // Replace with actual price if needed

            // Prepare and bind
            $stmt = $conn->prepare("INSERT INTO workshops (Title, Description, Instructor_ID, Start_Date, End_Date, Price) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiiss", $title, $description, $instructorId, $startDate, $endDate, $price);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<div id='successMessage' class='success-message'>Workshop submitted successfully!</div>";
            } else {
                echo "<p class='error-message'>Error: " . $stmt->error . "</p>";
            }

            // Close connections
            $stmt->close();
            $conn->close();
        }
        ?>
        <form id="workshopForm" action="" method="post">
            <label for="workshopTitle">Workshop Title:</label>
            <input type="text" id="workshopTitle" name="workshopTitle" required>
            <div id="titleError" class="error-message"></div>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <div id="dateError" class="error-message"></div>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
            <div id="descriptionError" class="error-message"></div>

            <label for="link">Link:</label>
            <input type="text" id="link" name="link" required>
            <div id="linkError" class="error-message"></div>

            <button type="submit" class="button">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('workshopForm').addEventListener('submit', function(event) {
            var isValid = true;

            // Clear previous error messages
            document.getElementById('titleError').textContent = '';
            document.getElementById('dateError').textContent = '';
            document.getElementById('descriptionError').textContent = '';
            document.getElementById('linkError').textContent = '';

            var title = document.getElementById('workshopTitle').value;
            var date = document.getElementById('date').value;
            var description = document.getElementById('description').value;
            var link = document.getElementById('link').value;

            if (title.trim() === '') {
                document.getElementById('titleError').textContent = 'Please enter the workshop title.';
                isValid = false;
            }

            if (date.trim() === '') {
                document.getElementById('dateError').textContent = 'Please enter the date.';
                isValid = false;
            }

            if (description.trim() === '') {
                document.getElementById('descriptionError').textContent = 'Please enter the description.';
                isValid = false;
            }

            if (link.trim() === '') {
                document.getElementById('linkError').textContent = 'Please enter the link.';
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });
    </script>
</body>
</html>
