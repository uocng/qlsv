<?php
// Bắt đầu phiên làm việc (session)
session_start();

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    // Nếu không, chuyển hướng về trang đăng nhập hoặc hiển thị thông báo lỗi
    echo "Bạn chưa đăng nhập!";
    exit;
}

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbb"; // Thay thế 'your_database_name' bằng tên cơ sở dữ liệu của bạn

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy các giá trị từ form
$new_username = $_POST['username'];
$email = $_POST['email'];
$current_password = $_POST['current_password']; // Thêm trường này

// Lấy ID của người dùng từ phiên làm việc (session)
$user_id = $_SESSION['user_id'];

// Truy vấn để lấy thông tin người dùng
$sql_select = "SELECT * FROM accounts WHERE id = $user_id";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Kiểm tra mật khẩu hiện tại
    if (password_verify($current_password, $row['password'])) {
        // Mật khẩu hiện tại đúng, tiếp tục cập nhật thông tin tài khoản
        $sql_update = "UPDATE accounts SET username='$new_username', email='$email' WHERE id=$user_id";
        if ($conn->query($sql_update) === TRUE) {
            // Chuyển hướng về trang home và làm mới trang
            header("Location: home.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Mật khẩu hiện tại không đúng!";
    }
} else {
    echo "Không tìm thấy thông tin người dùng!";
}

// Đóng kết nối
$conn->close();
?>
