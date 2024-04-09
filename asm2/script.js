function openAddWindow() {
  // Mở cửa sổ pop-up
  var addWindow = window.open(
    "add_account.php",
    "Add Account",
    "width=400,height=300"
  );
}

function confirmDelete(id) {
  // Hiển thị hộp thoại xác nhận
  var result = confirm("Bạn muốn xóa tài khoản này?");
  // Nếu người dùng chọn "OK" trong hộp thoại xác nhận
  if (result) {
    // Gửi yêu cầu xóa tài khoản đến máy chủ
    deleteAccount(id);
  }
}

function deleteAccount(id) {
  // Gửi yêu cầu xóa tài khoản đến máy chủ, ví dụ sử dụng Ajax hoặc tải lại trang với tham số id
  window.location.href = "delete_account.php?id=" + id;
}
