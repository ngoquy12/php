<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <div class="header">
        <div class="header-left">
            <a class="header-link" href="./index.html">Quay lại trang chủ</a>
            <a class="header-link" href="./form_add.html">Thêm mới nhân viên</a>
        </div>
        <div class="header-right">
            <input type="text" placeholder="Tìm kiếm theo mã, tên" class="input-search">
            <a class="header-link" href="">Đăng ký</a>
            <a class="header-link" href="">Đăng nhập</a>
        </div>
    </div>
    <h2 class="heading">DANH SÁCH NHÂN VIÊN</h2>
    <table>
        <tr>
            <th style="min-width: 30px;">Mã nhân viên</th>
            <th style="min-width: 150px;">Tên nhân viên</th>
            <th style="min-width: 30px; text-align: center;">Ngày sinh</th>
            <th style="min-width: 20px;">Giới tính</th>
            <th style="min-width: 150px;">Địa chỉ</th>
            <th style="min-width: 15px;">Số điện thoại</th>
            <th style="min-width: 50px;">Tài khoản ngân hàng</th>
            <th style="min-width: 150px;">Tên ngân hàng</th>
            <th style="min-width: 20px;">Chi nhánh ngân hàng</th>
            <th style="min-width: 20px;" colspan="2">Chức năng</th>
        </tr>
        <?php
        require 'connection.php';
        $query = mysqli_query($conn, "select * from `employees`");

        while ($row = mysqli_fetch_array($query)) {
            $date = date_create('');
        ?>
            <tr>
                <td><?php echo $row['EmployeeCode']; ?></td>
                <td><?php echo $row['EmployeeName']; ?></td>
                <td style="text-align: center;"><?php echo $row['DateOfBirth']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['PhoneNumber']; ?></td>
                <td><?php echo $row['BankAccount']; ?></td>
                <td><?php echo $row['BankName']; ?></td>
                <td><?php echo $row['BankBranchName']; ?></td>
                <td><a href="edit_employee.php?EmployeeID=<?php echo $row['EmployeeID']; ?>">Sửa</a></td>
                <td><a href="delete_employee.php?EmployeeID=<?php echo $row['EmployeeID']; ?>">Xoá</a></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <style>
        table {
            border-collapse: collapse;
            margin: 30px auto;
        }

        td,
        th {
            border: 1px solid #333;
            text-align: left;
            padding: 8px 18px;
        }

        tr:hover{
            background-color: #dddddd;
            cursor: pointer;
        }

        tr:nth-child(1) {
            background-color: #dddddd;
        }
        tr:nth-child(1):hover {
            cursor: default;
        }

        .button {
            min-width: 80px;
            border: none;
            border-radius: 4px;
            padding: 0 18px;
            height: 36px;
            background-color: #2fdc2f;
            margin: 20px;
        }

        .button a {
            color: white;
            text-decoration: none;
        }

        .button:hover {
            opacity: 0.7;
            cursor: pointer;
        }

        .header{
            display: flex;
            height: 80px;
            background-color: #fbb0bd; 
            align-items: center ;
            justify-content: space-between;
        }

        .header-link{
            text-decoration: none;
            margin: 0 10px;
            color: white;
        }

        .input-search{
            margin-right: 20px;
            padding: 5px;
            min-width: 150px;
            border-radius: 4px;
            outline: none;
            border: 1px solid #dddddd;
            color: #333;
        }

        .input-search:focus{
            border: 1px solid #2fdc2f;
        }

        .heading{
            text-align: center;
            margin-top: 20px;
        }
    </style>
</body>

</html>