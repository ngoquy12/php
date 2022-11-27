<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Thêm mới nhân viên</title>
</head>

<body>
    

    <?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once('./connection.php');

    // 2. Người dùng mới truy cập trang lần đầu tiên (người dùng chưa gởi dữ liệu btnSave - chưa nhấn nút Save) về Server
    // có nghĩa là biến $_POST['btnSave'] chưa được khởi tạo hoặc chưa có giá trị
    // => hiển thị Form nhập liệu

    // Nếu biến $_POST['btnSave'] đã được khởi tạo
    // => Người dùng đã bấm nút "Thêm "
    if (isset($_POST['btnSave'])) {

        // 3. Nếu người dùng có bấm nút Thêm  thì thực thi câu lệnh INSERT
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $employee_code = $_POST['employee_code'];
        $employee_name = $_POST['employee_name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $bank_account = $_POST['bank_account'];
        $bank_name = $_POST['bank_name'];
        $bank_branch = $_POST['bank_branch'];


        // 4. Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];

        // --- Kiểm tra Mã nhân viên (validate)
        // required (bắt buộc nhập <=> không được rỗng)
        if (empty($employee_code)) {
            $errors['employee_code'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $employee_code,
                'msg' => 'Mã nhân viên không được phép để trống'
            ];
        }
        // minlength 3 (tối thiểu 3 ký tự)
        if (!empty($employee_code) && strlen($employee_code) < 3) {
            $errors['supplier_code'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $employee_code,
                'msg' => 'Mã nhân viên phải có ít nhất 3 ký tự'
            ];
        }
        // maxlength 36 (tối đa 36 ký tự)
        if (!empty($employee_code) && strlen($employee_code) > 36) {
            $errors['employee_code'][] = [
                'rule' => 'maxlength',
                'rule_value' => 36,
                'value' => $employee_code,
                'msg' => 'Mã nhân viên không được vượt quá 36 ký tự'
            ];
        }

        // --- Kiểm tra Tên nhân viên (validate)
        // required (bắt buộc nhập <=> không được rỗng)
        if (empty($employee_name)) {
            $errors['employee_name'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $employee_name,
                'msg' => 'Tên nhân viên không được phép để trống'
            ];
        }

        // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
        // dd($errors);
        if (!empty($errors)) {
            // In ra thông báo lỗi
            // kèm theo dữ liệu thông báo lỗi
            foreach ($errors as $errorField) {
                foreach ($errorField as $error) {
                    echo $error['msg'] . '<br />';
                }
            }
            return;
        }

        // 6. Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
        // Câu lệnh INSERT
        $sqlInsert = <<<EOT
        INSERT INTO employees( EmployeeCode, EmployeeName, DateOfBirth, Gender, Address, PhoneNumber, BankAccount, BankName, BankBranchName)
        VALUES ('$employee_code', '$employee_name', '$dob', '$gender', '$address', '$phone', '$bank_account', '$bank_name', '$bank_branch')
EOT;

        // Code dùng cho DEBUG
        // var_dump($sqlInsert); die;

        // Thực thi INSERT
        mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:list_employee.php');
    }
    ?>

    
</body>

</html>