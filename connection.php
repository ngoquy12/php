<?php
//Khởi tạo kết nối
$conn = mysqli_connect("localhost","root","","employee");
// Kiểm tra kết nối
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
