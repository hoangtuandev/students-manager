<?php
include("./ConnectDB.php") ;

$username = $_POST['username'] ;
$password = $_POST['password'] ;

$sql = "INSERT INTO TaiKhoan (tendangnhap, matkhau)
        VALUES ('$username', '$password')" ;
if(mysqli_query($connect, $sql))
    header("Location: login.php") ;
else
    header("Location: register.php") ;
?>