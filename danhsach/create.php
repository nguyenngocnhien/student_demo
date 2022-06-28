<?php
if (isset($_POST['sbm'])) {
    $student_code = $_POST['student_code'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $maths_point = $_POST['maths_point'];
    $physics_point = $_POST['physics_point'];
    $chemistry_point = $_POST['chemistry_point'];
    $created_date = date("Y-m-d");
    $sql = "INSERT INTO info_student(student_code,fullname,email,address,phone_number,created_date )
            VALUES ('$student_code','$fullname','$email','$address','$phone_number','$created_date')";
    $query = mysqli_query($connect, $sql);
    if (mysqli_query($connect, $sql)) {
        // Lấy ID đã chèn cuối cùng
        $last_id = mysqli_insert_id($connect);
        $sql = "INSERT INTO subject_student(id_student,physics_point,chemistry_point,maths_point )
        VALUES ('$last_id','$physics_point','$chemistry_point','$maths_point')";
        $query = mysqli_query($connect, $sql);
    } else {
        echo "ERROR: Không thể thực thi câu lệnh $sql. " . mysqli_error($connect);
    }
}
?>
<div class="container-fluit">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sinh viên</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="my-input">Mã SV</label>
                    <input id="my-input" class="form-control" type="text" name="student_code" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Họ tên</label>
                    <input id="my-input" class="form-control" type="text" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Email address</label>
                    <input id="my-input" class="form-control" type="text" name="email" placeholder="name@example.com" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Địa chỉ</label>
                    <input id="my-input" class="form-control" type="text" name="address" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Số điện thoại</label>
                    <input id="my-input" class="form-control" type="text" name="phone_number" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Toán</label>
                    <input id="my-input" class="form-control" type="number" name="maths_point" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Lý</label>
                    <input id="my-input" class="form-control" type="number" name="physics_point" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Hóa</label>
                    <input id="my-input" class="form-control" type="number" name="chemistry_point" required>
                </div>

                <button name="sbm" type="submit" class="btn btn-success mt-1">Thêm</button>
            </form>
        </div>
    </div>
</div>