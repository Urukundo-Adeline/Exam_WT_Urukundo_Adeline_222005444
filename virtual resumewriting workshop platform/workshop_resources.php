<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workshop Resources Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 600px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    textarea {
      height: 100px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Workshop Resources Form</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form submission
        $servername = "127.0.0.1";
        $username = "your_username";
        $password = "your_password";
        $dbname = "virtual_resume_writting_workshops_platform";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO workshop_resources (Workshop_ID, Resource_ID, Resource_Type, Resource_Description, Resource_URL) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("iisss", $workshop_id, $resource_id, $resource_type, $resource_description, $resource_url);

        // Set parameters
        $workshop_id = $_POST['workshop_id'];
        $resource_id = $_POST['resource_id'];
        $resource_type = $_POST['resource_type'];
        $resource_description = $_POST['resource_description'];
        $resource_url = $_POST['resource_url'];

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Workshop resource submitted successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="workshop_resource_id">Workshop Resource ID</label>
        <input type="text" id="workshop_resource_id" name="workshop_resource_id" required>
      </div>
      <div class="form-group">
        <label for="workshop_id">Workshop ID</label>
        <input type="text" id="workshop_id" name="workshop_id" required>
      </div>
      <div class="form-group">
        <label for="resource_id">Resource ID</label>
        <input type="text" id="resource_id" name="resource_id" required>
      </div>
      <div class="form-group">
        <label for="resource_type">Resource Type</label>
        <select id="resource_type" name="resource_type" required>
          <option value="">Select a resource type</option>
          <option value="document">Document</option>
          <option value="video">Video</option>
          <option value="link">Link</option>
        </select>
      </div>
      <div class="form-group">
        <label for="resource_description">Resource Description</label>
        <textarea id="resource_description" name="resource_description" required></textarea>
      </div>
      <div class="form-group">
        <label for="resource_url">Resource URL</label>
        <input type="text" id="resource_url" name="resource_url" required>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
