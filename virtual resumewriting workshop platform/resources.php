<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Resources</title>
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
        <h2>Submit Resources</h2>
        <form id="resourceForm">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <div id="titleError" class="error-message"></div>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>
            <div id="descriptionError" class="error-message"></div>

            <label for="link">Link:</label>
            <input type="text" id="link" name="link" required>
            <div id="linkError" class="error-message"></div>

            <button type="submit" class="button">Submit</button>
            <div id="successMessage" class="success-message" style="display: none;"></div>
        </form>
    </div>

    <script>
        document.getElementById('resourceForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Clear previous error messages
            document.getElementById('titleError').textContent = '';
            document.getElementById('descriptionError').textContent = '';
            document.getElementById('linkError').textContent = '';

            var title = document.getElementById('title').value;
            var description = document.getElementById('description').value;
            var link = document.getElementById('link').value;

            var isValid = true;

            if (title.trim() === '') {
                document.getElementById('titleError').textContent = 'Please enter the title.';
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

            if (isValid) {
                // Normally, you would send the form data to a server here.
                // For demonstration purposes, just display a success message.
                document.getElementById('successMessage').style.display = 'block';
                document.getElementById('successMessage').textContent = 'Resource submitted successfully!';
                document.getElementById('resourceForm').reset(); // Clear form
                setTimeout(function() {
                    document.getElementById('successMessage').style.display = 'none';
                }, 3000); // Hide success message after 3 seconds
            }
        });
    </script>
</body>
</html>
