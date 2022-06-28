<?php
$sql = "SELECT i.student_code, i.fullname,i.phone_number, i.email, i.address, s.chemistry_point,s.physics_point, s.maths_point FROM info_student i INNER JOIN subject_student s ON i.id_student = s.id_student ";
$query = mysqli_query($connect, $sql);
if (isset($_POST['srch'])) {
    $dateFrom =  $_POST['dateFrom'];
    $dateTo =  $_POST['dateTo'];
    $sql = "SELECT i.student_code, i.fullname,i.phone_number,i.created_date,i.id_student, i.email, i.address, s.chemistry_point,s.physics_point, s.maths_point FROM info_student i INNER JOIN subject_student s ON i.id_student = s.id_student 
    WHERE i.created_date >= '$dateFrom' AND i.created_date <= '$dateTo'";
    $query = mysqli_query($connect, $sql);
}
?>
<form method="POST" action="index.php?page_layout=home">
    <div class="row g-3 mt-1 mb-1">
        <div class="col-sm-3">
            <div class="row" style=" text-align: center">
                <div class="col-3">
                    <label for="my-input">Từ ngày</label>
                </div>
                <div class="col-9 ">
                    <input id="my-input" class="form-control" type="date" name="dateFrom" required>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="row">
                <div class="col-3">
                    <label for="my-input">Đến ngày</label>
                </div>
                <div class="col-9 ">
                    <input id="my-input" class="form-control" type="date" name="dateTo" required>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <button name="srch" type="submit" class="btn btn-success mt-1">Search</button>
        </div>
    </div>
</form>
<div class="container-fluid text-primary">
    <div class="card">
        <div class="card-header text-left" style="background-color: #cce4eeaa;">
            <h3>Danh sách sinh viên</h3>
        </div>
        <div class="card-body">
            <table class="table ">
                <thead class="thead-dark text-primary">
                    <tr>
                        <th>Stt</th>
                        <th>Mã SV</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Toán</th>
                        <th>Lý</th>
                        <th>Hóa</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['student_code']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></th>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['maths_point']; ?></th>
                            <td><?php echo $row['physics_point']; ?></th>
                            <td><?php echo $row['chemistry_point']; ?></th>
                            <td>Sửa</td>
                            <td>Xóa</td>
                        </tr>
                    <?php    } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="index.php?page_layout=create">Thêm mới</a>
        </div>
    </div>
</div>