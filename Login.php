<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="content">
        <div class="background__img">
            <img src="./img/ctu-2.jpeg" alt="">
        </div>
        <div class="form">
            <form action="./XuLyDangNhap.php" method="POST">
                    <p>ĐĂNG NHẬP </p>
                    <input type="text" name="username" placeholder="Tên người dùng">
                    <input type="text" name="password" placeholder="Mật khẩu">
                   
                    <button type="submit" id="btn-top">ĐĂNG NHẬP</button>
                    <a href="./Register.php" id="btn-bottom">ĐĂNG KÝ</a>
            </form>
        </div>
    </div>
</body>
</html>