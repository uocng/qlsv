<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background: url(./img/unnamed.jpg);     
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 90px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.4); /* Mờ đi với độ mờ là 0.7 */
            background: url(./img/desktop-wallpaper-background-for-student-portal-tip-college-student.jpg);
        }

        .container h2 {
            text-align: center;
        }

        .container input[type="text"],
        .container input[type="password"],
        .container input[type="email"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .container button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .container p {
            margin-top: 15px;
            text-align: center;
            color: #ccc;
        }

        .container p a {
            color: #007bff;
            text-decoration: none;
        }

        .container p a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="signup_process.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>
