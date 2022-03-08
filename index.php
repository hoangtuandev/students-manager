<?php
include("./ConnectDB.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./main.css">
    <title>Quản lý sinh viên</title>
    
</head>

<body>
    
    <div class="container-fluid manager__student">
        <p id="title">QUẢN LÝ SINH VIÊN</p>
        <div class="row">
            <div class="col-4" id="form-student">

                <form action="./XuLy.php" method="POST">
                    <table>
                        <tr>
                            <td><label for="mssv" style="color: rgb(61, 124, 196) ;">Mã số sinh viên</label></td>
                            <td><input type="text" id="mssv" name="mssv" style="border: 2px solid rgb(61, 124, 196);font-weight: bold;color: rgb(61, 124, 196);"></td>
                        </tr>
                        <tr>
                            <td><label for="fullname">Họ tên</label></td>
                            <td><input type="text" id="fullname" name="fullname"></td>
                        </tr>
                        <tr>
                            <td><label for="numberphone">Số điện thoại</label></td>
                            <td><input type="text" id="numberphone" name="numberphone"></td>
                        </tr>
                        <tr>
                            <td><label for="birthday">Ngày sinh</label></td>
                            <td><input type="date" id="birthday" name="birthday"></td>
                        </tr>
                        <tr>
                            <td><label for="gender">Giới tính</label></td>
                            <td id="gender-input">
                                <span>
                                    <label for="gender1">Nam</label>
                                    <input type="radio" name="gender" id="gender1" value="Nam">
                                </span>
                                <span>
                                    <label for="gender2">Nữ</label>
                                    <input type="radio" name="gender" id="gender2" value="Nữ">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="makhoa">Mã khoa</label></td>
                            <td><input type="text" id="makhoa" name="makhoa"></td>
                        </tr>
                        <tr>
                            <td><label for="address">Địa chỉ</label></td>
                            <td>
                                <textarea name="address" id="address" cols="33" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" id="add-btn" name="add-btn"> THÊM</button>
                                <button type="submit" id="edit-btn" name="edit-btn">SỬA</button>
                                <button type="submit" id="delete-btn" name="delete-btn">XÓA</button>
                                <button type="submit" id="find-btn" name="find-btn">TÌM</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-8" id="list-student">
                <a href="index.php" id="all-students">TẤT CẢ SINH VIÊN</a>
                <table>
                    <tr>
                        <!-- <th>STT</th> -->
                        <th>Mã số SV</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Mã khoa</th>
                        <th>Địa chỉ</th>
                    </tr>
                    <?php
                    include("./ConnectDB.php");
                    // $sql = "SELECT * FROM SinhVien ORDER BY mssv ASC";
                    $sql = 'CALL all_students() ' ;
                    $result = mysqli_query($connect, $sql);
                    $count = 0;
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                            <tr  class="style1">

                                <td class="style style2">' . $row['mssv'] . '</td>
                                <td>' . $row['hoten'] . '</td>
                                <td class="style">' . $row['sodienthoai'] . '</td>
                                <td class="style">' . $row['ngaysinh'] . '</td>
                                <td class="style">' . $row['gioitinh'] . '</td>
                                <td class="style">' . $row['makhoa'] . '</td>
                                <td>' . $row['diachi'] . '</td>
                            </tr>
                            ';
                    }
                    ?>

                </table>
                <p id="total__sv">Tổng số
                    <span style="font-weight:bold ; font-size: 18px; color: red ;">
                        <?php
                            include("./ConnectDB.php");
                            $sql = 'SELECT count_student() ' ;
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result) ;
                            echo $row['count_student()'] ;
                        ?>
                    </span> sinh viên
                </p>
            </div>
        </div>
    </div>
</body>

</html>

