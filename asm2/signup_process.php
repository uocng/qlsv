<?php
session_start();

// Kết nối đến cơ sở dữ liệu (Bạn cần cung cấp các thông tin đăng nhập của cơ sở dữ liệu)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bbb";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ biểu mẫu đăng ký
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Chuẩn bị truy vấn để thêm người dùng mới vào cơ sở dữ liệu
$stmt = $conn->prepare("INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $hashed_password, $email);

// Thực thi truy vấn
if ($stmt->execute()) {
    header("Location: login.php");
    echo "sign up successful";
    exit();
    
} else {
    echo "Error: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
