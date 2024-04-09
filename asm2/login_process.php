<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bbb";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ biểu mẫu đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Truy vấn để lấy thông tin người dùng, bao gồm user_id
$sql = "SELECT id, username, password FROM accounts WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Xác minh mật khẩu
    if (password_verify($password, $row['password'])) {
        // Lưu user_id vào session
        $_SESSION['user_id'] = $row['id'];
        // Chuyển hướng người dùng đến trang chính
        header("Location: home.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
} else {
    echo "Invalid username or password.";
}

$stmt->close();
$conn->close();
?>
