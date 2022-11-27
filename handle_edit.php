<?php
include_once('./connection.php');
// 4. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
if (isset($_POST['btnSave'])) {
    // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
    $id = $_POST['employee_id'];
    $employee_code = $_POST['employee_code'];
    $employee_name = $_POST['employee_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $bank_account = $_POST['bank_account'];
    $bank_name = $_POST['bank_name'];
    $bank_branch = $_POST['bank_branch'];

    // Câu lệnh UPDATE
    $sql = "UPDATE employees SET EmployeeCode='$employee_code',EmployeeName='$employee_name',DateOfBirth='$dob',Gender='$gender', Address='$address',PhoneNumber='$phone',
        BankAccount='$bank_account',BankName='$bank_name',BankBranchName='$bank_branch' WHERE EmployeeID='$id'";

    // Thực thi UPDATE
    mysqli_query($conn, $sql);

    // Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:list_employee.php');
}
