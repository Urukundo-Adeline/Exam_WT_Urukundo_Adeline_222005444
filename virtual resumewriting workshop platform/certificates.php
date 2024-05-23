<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workshop Certificate Issuance</title>
  <style>
    /* Add your custom CSS styles here */
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

  <h2>Workshop Certificate Issuance</h2>

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
    $attendeeId = $_POST['attendeeId'];
    $workshopId = $_POST['workshopId'];
    $issueDate = $_POST['issueDate'];
    $certificateUrl = $_POST['certificateUrl'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO certificates (Attendee_ID, Workshop_ID, Issue_Date, Certificate_URL) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $attendeeId, $workshopId, $issueDate, $certificateUrl);

    // Execute the statement
    if ($stmt->execute()) {
      echo "<p>New certificate issued successfully</p>";
    } else {
      echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
  }
  ?>

  <form id="certificateForm" action="" method="post">
    <div class="form-group">
      <label for="attendeeId">Attendee ID:</label>
      <input type="text" id="attendeeId" name="attendeeId" required>
    </div>
    <div class="form-group">
      <label for="workshopId">Workshop ID:</label>
      <input type="text" id="workshopId" name="workshopId" required>
    </div>
    <div class="form-group">
      <label for="issueDate">Issue Date:</label>
      <input type="date" id="issueDate" name="issueDate" required>
    </div>
    <div class="form-group">
      <label for="certificateUrl">Certificate URL:</label>
      <input type="text" id="certificateUrl" name="certificateUrl" required>
    </div>
    <button type="submit">Issue Certificate</button>
  </form>

</body>
</html>
