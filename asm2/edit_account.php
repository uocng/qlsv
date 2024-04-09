<?php
// Bắt đầu phiên làm việc (session)
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body{
            background: url(./img/hinh-nen-hoc-tap-17.jpg);     
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 70px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.4); /* Mờ đi với độ mờ là 0.7 */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Account</h2>
        <form action="edit_account_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $_GET['username']; ?>" required>
            </div>
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $_GET['email']; ?>" required>
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
