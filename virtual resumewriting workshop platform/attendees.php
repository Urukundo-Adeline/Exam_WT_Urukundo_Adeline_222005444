<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendees Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    h2 {
      text-align: center;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <h2>Attendees Form</h2>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $userId = $_POST['userId'];
      $registrationDate = $_POST['registrationDate'];
      $workshopId = $_POST['workshopId'];

      // Database connection
      $servername = "localhost";
      $username = "root"; // replace with your database username
      $password = ""; // replace with your database password
      $dbname = "virtual_resume_writting_workshops_platform";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "INSERT INTO attendees (User_ID, Workshop_ID, Registration_Date) VALUES (?, ?, ?)";
      $stmt = $conn->prepare($sql);
      if ($stmt === false) {
          die("Error preparing statement: " . $conn->error);
      }

      $stmt->bind_param("iis", $userId, $workshopId, $registrationDate);

      if ($stmt->execute()) {
          echo "<p>Registration successful!</p>";
      } else {
          echo "<p>Error: " . $stmt->error . "</p>";
      }

      $stmt->close();
      $conn->close();
  }
  ?>

  <form id="registrationForm" method="POST" action="">
    <div class="form-group">
      <label for="userId">User ID:</label>
      <input type="text" id="userId" name="userId" required>
    </div>
    <div class="form-group">
      <label for="registrationDate">Registration Date:</label>
      <input type="date" id="registrationDate" name="registrationDate" required>
    </div>
    <div class="form-group">
      <label for="workshopId">Workshop ID:</label>
      <input type="text" id="workshopId" name="workshopId" required>
    </div>
    <button type="submit">Register</button>
  </form>

</body>
</html>
