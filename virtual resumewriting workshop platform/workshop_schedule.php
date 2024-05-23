<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workshop Schedule Form</title>
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
    input[type="date"],
    input[type="time"],
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
    <h2>Workshop Schedule Form</h2>
    <form action="#" method="post">
      <div class="form-group">
        <label for="schedule_id">Schedule ID</label>
        <input type="text" id="schedule_id" name="schedule_id" required>
      </div>
      <div class="form-group">
        <label for="workshop_id">Workshop ID</label>
        <input type="text" id="workshop_id" name="workshop_id" required>
      </div>
      <div class="form-group">
        <label for="session_number">Session Number</label>
        <input type="text" id="session_number" name="session_number" required>
      </div>
      <div class="form-group">
        <label for="session_date">Session Date</label>
        <input type="date" id="session_date" name="session_date" required>
      </div>
      <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" id="start_time" name="start_time" required>
      </div>
      <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" id="end_time" name="end_time" required>
      </div>
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" required>
      </div>
      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
