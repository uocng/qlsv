<?php
// Kết nối đến cơ sở dữ liệu (Cần cung cấp thông tin đăng nhập của cơ sở dữ liệu)
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "bbb";

// Kiểm tra xem dữ liệu đã được gửi từ biểu mẫu chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau không
    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Password and Confirm Password do not match";
    } else {
        // Dữ liệu từ biểu mẫu
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Kết nối đến cơ sở dữ liệu
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Chuẩn bị truy vấn để thêm tài khoản mới vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $email);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Đóng kết nối
            $stmt->close();
            $conn->close();

            // Gửi lệnh đóng cửa sổ và chuyển hướng về trang home
            echo "<script>window.close(); window.opener.location.reload();</script>";
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
    }
}
?>
