<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật nhân viên</title>
</head>

<body>

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once('./connection.php');

    // 2. Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
    // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
    $id = $_GET['EmployeeID'];
    $sqlSelect = "SELECT * FROM employees WHERE EmployeeID=$id";

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record cần update
    $resultSelect = mysqli_query($conn, $sqlSelect);
    $employee_row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record

    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($employee_row)) {
        echo "Giá trị id: $id không tồn tại. Vui lòng kiểm tra lại.";
        die;
    }
    ?>

    <!-- Main content -->
    <div class="container">
        <div class="container">
            <form action="./handle_edit.php" method="POST" class="form">
                <h3>CẬP NHẬT NHÂN VIÊN</h3>
                <table class="table">

                    <tr class="table-tr">
                        <td class="table-td">
                            <input class="form-input" type="text" name="employee_id" id="id" value="<?php echo $employee_row['EmployeeID'] ?>" hidden>
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="code">Mã nhân viên</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="employee_code" id="code" value="<?php echo $employee_row['EmployeeCode'] ?>" readonly>
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="name">Tên nhân viên</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="employee_name" id="name" value="<?php echo $employee_row['EmployeeName'] ?>">
                        </td>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="dob">Ngày sinh</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="date" name="dob" value="<?php echo $employee_row['DateOfBirth'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="gender">Giới tính</label>
                        </td>
                        <td class="table-td">
                            <label class="form-lable" for="gender">Nam</label>
                            <input class="form-input" type="radio" name="gender" id="male" value="0" checked value="<?php echo $employee_row['Gender'] ?>">
                            <label class="form-lable" for="gender">Nữ</label>
                            <input class="form-input" type="radio" name="gender" id="female" value="1" value="<?php echo $employee_row['Gender'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="address">Địa chỉ</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="address" value="<?php echo $employee_row['Address'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="address">Số điện
                                thoại</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="phone" value="<?php echo $employee_row['PhoneNumber'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="bank_account">Tài
                                khoản ngân hàng</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="bank_account" value="<?php echo $employee_row['BankAccount'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="bank_name">Tên
                                ngân hàng</label>
                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="bank_name" value="<?php echo $employee_row['BankName'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <label class="form-lable" for="bank_branch">Chi
                                nhánh ngân hàng</label>

                        </td>
                        <td class="table-td">
                            <input class="form-input" type="text" name="bank_branch" value="<?php echo $employee_row['BankBranchName'] ?>">
                        </td>
                    </tr>
                    <tr class="table-tr">
                        <td class="table-td">
                            <input type="submit" value="Lưu" name="btnSave">
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>