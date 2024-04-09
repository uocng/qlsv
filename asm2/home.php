<?php
// Bắt đầu phiên làm việc (session)
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <style>
        body{
            background: url(./img/hero_blog-mobile.jpg);     
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 500px;
    width: 700px;
    background-color: rgba(255, 255, 255, 0.4);
    
}

.table-container {
    width: 440px; /* Thiết lập chiều rộng của bảng */
    overflow-x: auto; /* Tạo thanh cuộn ngang nếu bảng quá rộng */
}

table {
    width: 100%; /* Thiết lập bảng chiều rộng 100% của phần tử cha */
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

.action-buttons, .button-container {
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Manage User Accounts</h2>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                // Kết nối đến cơ sở dữ liệu (Cần cung cấp thông tin đăng nhập của cơ sở dữ liệu)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bbb";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Truy vấn dữ liệu từ bảng accounts
                $sql = "SELECT id, username, email FROM accounts";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Hiển thị dữ liệu trong bảng HTML
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["email"]."</td>";
                        echo "<td><button onclick='confirmDelete(".$row['id'].")'>Delete</button></td>";
                        echo "<td><a href='edit_account.php?username=".$row['username']."&email=".$row['email']."'>Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No accounts found</td></tr>";
                }

                // Đóng kết nối
                $conn->close();
                ?>
            </table>
        </div>
        <div class="action-buttons">
            <button onclick="openAddWindow()">Add</button>
            
            
        </div>
        <div class="button-container">
            <a href="login.php" class="btn">Back to Login</a>
        </div>
    </div>
</body>
</html>

