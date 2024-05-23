
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 400px;
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
    input[type="password"],
    input[type="email"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
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
    <h2>User Registration Form</h2>
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
        $stmt = $conn->prepare("INSERT INTO users (Username, Password, Email, FullName, Role) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->bind_param("sssss", $username, $password_hashed, $email, $fullname, $role);

        // Set parameters
        $username = $_POST['username'];
        $password_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $email = $_POST['email'];
        $fullname = $_POST['fullname'];
        $role = $_POST['role'];

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "<p style='color: green;'>User registered successfully!</p>";
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
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>
      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role" required>
          <option value="">Select a role</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
          <option value="guest">Guest</option>
        </select>
      </div>
      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
