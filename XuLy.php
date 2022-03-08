<?php
include("./ConnectDB.php");

// THEM SINH VIEN
if (isset($_POST['add-btn'])) {
    $mssv = $_POST['mssv'];
    $fullname = $_POST['fullname'];
    $numberphone = $_POST['numberphone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $makhoa = $_POST['makhoa'];
    $address = $_POST['address'];

    if (($mssv != "" && $mssv != null) && ($fullname != "" && $fullname != null)) {
        $sql = "INSERT INTO SinhVien (mssv, hoten, sodienthoai, ngaysinh, gioitinh, diachi, makhoa)
            VALUES ('$mssv', '$fullname', '$numberphone', '$birthday', '$gender', '$address', '$makhoa') ";
        if (mysqli_query($connect, $sql)) {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
}
// CAP NHAT SINH VIEN
else if (isset($_POST['edit-btn'])) {
    $mssv = $_POST['mssv'];
    $fullname = $_POST['fullname'];
    $numberphone = $_POST['numberphone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $makhoa = $_POST['makhoa'];
    $address = $_POST['address'];

    if ($mssv != "" && $mssv != null) {
        if ($fullname != "" && $fullname != null) {
            $sql = "UPDATE SinhVien
                    SET hoten = '$fullname' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        if ($numberphone != "" && $numberphone != null) {
            $sql = "UPDATE SinhVien
                    SET sodienthoai = '$numberphone' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        if ($birthday != "" && $birthday != null) {
            $sql = "UPDATE SinhVien
                    SET ngaysinh = '$birthday' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        if ($gender != "" && $gender != null) {
            $sql = "UPDATE SinhVien
                    SET gioitinh = '$gender' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        if ($makhoa != "" && $makhoa != null) {
            $sql = "UPDATE SinhVien
                    SET makhoa = '$makhoa' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        if ($address != "" && $address != null) {
            $sql = "UPDATE SinhVien
                    SET diachi = '$address' 
                    WHERE mssv = '$mssv' ";
            mysqli_query($connect, $sql);
        }

        header("Location: index.php");
    } else {
        header("Location: index.php");
    }
}
// XOA SINH VIEN
else if (isset($_POST['delete-btn'])) {
    $mssv = $_POST['mssv'];
    if ($mssv != "" && $mssv != null) {
        $sql = "DELETE FROM SinhVien    
                WHERE mssv = '$mssv' ";
        if (mysqli_query($connect, $sql))
            header("Location: index.php");
    }
}
// TIM SINH VIEN
else if (isset($_POST['find-btn'])) {
    $GLOBALS['gender'] = "";
    $GLOBALS['mssv'] = $_POST['mssv'];
    $GLOBALS['fullname'] = $_POST['fullname'];
    $GLOBALS['numberphone'] = $_POST['numberphone'];
    $GLOBALS['birthday'] = $_POST['birthday'];
    if (isset($_POST['gender']))
        $GLOBALS['gender'] = $_POST['gender'];
    $GLOBALS['makhoa'] = $_POST['makhoa'];
    $GLOBALS['address'] = $_POST['address'];

    require "./TimKiem.php";
}

