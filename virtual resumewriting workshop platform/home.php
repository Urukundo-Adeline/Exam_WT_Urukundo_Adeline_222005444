<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('image 1.jpg'); /* Replace 'image1.jpg' with the path to your image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Add transparency to container */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align content */
            color: #333; /* Set text color */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-bottom: 20px; /* Add margin bottom */
            margin-right: 10px; /* Add margin right for spacing between buttons */
        }

        .button:hover {
            background-color: #0056b3;
        }

        .about-section {
            margin-top: 50px;
            text-align: left; /* Align text to left */
        }

        .about-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px; /* Add margin bottom */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <a href="registration.html" class="button">Get Started</a>
        <a href="about.html" class="button">About</a> <!-- Add the About button -->
        
    </div>
</body>
</html>
 