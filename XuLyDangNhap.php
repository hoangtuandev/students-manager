<?php
include("./ConnectDB.php") ;

$username = $_POST['username'] ;
$password = $_POST['password'] ;


$sql = "
        create procedure dssv_khoa( makhoa char(6)) 
        begin
            select * from sinhvien s where s.makhoa = makhoa;
        end$$
    ";

$sql = "SELECT * FROM TaiKhoan
        WHERE tendangnhap = '$username' AND matkhau = '$password' " ;
$result = mysqli_query($connect, $sql) ;   
$count = mysqli_num_rows($result);

if($count == 1 ){
    header("Location: index.php") ;
}
else {
    header("Location: login.php") ;
}
