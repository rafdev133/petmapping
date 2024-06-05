<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Administrator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #3498db, #e74c3c);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contact-container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        h3 {
            color: #333;
        }

        p {
            margin: 15px 0;
            color: #555;
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            background-color: #2ecc71;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>

    <div class="contact-container">
        <h3>Contact the Administrator</h3>
        <p>Email: <a href="https://mail.google.com/mail/?view=cm&fs=1&to=petmapping.admin@gmail.com" class="email-link">petmapping.admin@gmail.com</a></p>
        <p>Phone: (555) 123-4567</p>
        <p>Address: Pabahay 2000 Muzon San Jose Del Monte Bulacan</p>
        <!-- Add any other relevant contact information here -->

        <a href="login.php" class="back-button">Back to Login</a>
    </div>

</body>

</html>
