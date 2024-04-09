<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy ID của tài khoản cần xóa từ yêu cầu POST hoặc GET
$id = $_REQUEST['id'];

// Thực hiện truy vấn SQL để xóa tài khoản
$sql = "DELETE FROM accounts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Đóng kết nối
    $conn->close();
    // Chuyển hướng trang web sau khi xóa thành công
    echo "<script>window.location.href = 'home.php';</script>";
    exit; // Ngăn chặn mã PHP tiếp tục thực thi
} else {
    echo "Error deleting record: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
