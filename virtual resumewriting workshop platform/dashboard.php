<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('path/to/your/image.jpg'); /* Update the path */
            background-size: cover;
            background-repeat: no-repeat;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Add a semi-transparent white background to make content more readable */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1, h2 {
            text-align: center;
        }

        .logout-btn {
            text-align: center;
            margin-top: 20px;
        }

        .logout-btn button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-btn button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>

        <h2>Workshops</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Establish database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "virtual_resume_writting_workshops_platform";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch workshop data
            $sql_workshops = "SELECT * FROM workshops";
            $result_workshops = $conn->query($sql_workshops);

            if ($result_workshops->num_rows > 0) {
                while($row = $result_workshops->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Title"] . "</td>";
                    echo "<td>" . $row["Description"] . "</td>";
                    echo "<td>" . $row["Start_Date"] . "</td>";
                    echo "<td>" . $row["End_Date"] . "</td>";
                    echo "<td>$" . $row["Price"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No workshops found</td></tr>";
            }

            ?>
            </tbody>
        </table>

        <h2>Attendees</h2>
        <table>
            <thead>
                <tr>
                    <th>Attendee ID</th>
                    <th>User ID</th>
                    <th>Workshop ID</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Fetch attendee data
            $sql_attendees = "SELECT * FROM attendees";
            $result_attendees = $conn->query($sql_attendees);

            if ($result_attendees->num_rows > 0) {
                while($row = $result_attendees->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Attendee_ID"] . "</td>";
                    echo "<td>" . $row["User_ID"] . "</td>";
                    echo "<td>" . $row["Workshop_ID"] . "</td>";
                    echo "<td>" . $row["Registration_Date"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No attendees found</td></tr>";
            }

            ?>
            </tbody>
        </table>

        <h2>Payments</h2>
        <table>
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Attendee ID</th>
                    <th>Workshop ID</th>
                    <th>Payment Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Fetch payment data
            $sql_payments = "SELECT * FROM payments";
            $result_payments = $conn->query($sql_payments);

            if ($result_payments->num_rows > 0) {
                while($row = $result_payments->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Payment_ID"] . "</td>";
                    echo "<td>" . $row["Attendee_ID"] . "</td>";
                    echo "<td>" . $row["Workshop_ID"] . "</td>";
                    echo "<td>$" . $row["Payment_Amount"] . "</td>";
                    echo "<td>" . $row["Payment_Date"] . "</td>";
                    echo "<td>" . $row["Payment_Status"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No payments found</td></tr>";
            }

            ?>
            </tbody>
        </table>

        <!-- Add tables for certificates, feedback, instructors, resources, workshop_resources, workshop_schedule -->

        <div class="logout-btn">
            <button onclick="location.href='logout.php'">Logout</button>
        </div>
    </div>
</body>
</html>
