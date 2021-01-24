<?php
error_reporting(0);
session_start();
if($_POST) {
    include "dblink.php";
    $name = trim($_POST['name']," ");
    $lastname = trim($_POST['lastname']," ");
    $username = trim($_POST['username']," ");
    $password = trim($_POST['password']," ");
    $c_password = trim($_POST['c_password']," ");
    $email = trim($_POST['email']," ");
    $c_email = trim($_POST['c_email']," ");
    $tel = trim($_POST['tel']," ");
    if(!empty($name) && !empty($lastname) && !empty($username) && !empty($password) && !empty($c_password) && !empty($email) && !empty($c_email) && !empty($tel)){
            if($password==$c_password)  {
                if($email==$c_email) {
                    $sql = "REPLACE INTO caretaker VALUES('','$username','$password','$email','$name','$lastname','$tel','false')";
                    if(mysqli_query($link, $sql)){
                        echo "<script>setInterval(function() { location.href = 'index.php'; }, 100);
                        alert('เพิ่มสำเร็จ'); </script>";
                    }else{
                        echo "<script>alert('เกิดข้อผืดพลาด');</script>";
                    }
                }else{
                    echo "<script>alert('อีเมลล์ไม่ตรงกัน');</script>";
                }
            }else{
                echo "<script>alert('รหัสผ่านไม่ตรงกัน');</script>";
            }
    }else{
        echo "<script>alert('โปรดกรอกข้อมูลให้ครบ');</script>";
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Old Care</title>
    <style>
    .regis {
        margin-left: 55%;
        height: 700px;
        width: 50%;
    }

    body {
        background-image: url('bg.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
    </script>
</head>


<body>

    <?php include 'navbar.php'; ?><br><br><br><br><br><br>
    <?php include 'login.php'; ?>
    <div class="regis">
        <form method="post">
            <h1>สมัครสมาชิกผู้ดูแล</h1><br>
            <input class="form-control" style="width:300px" type="text" name="name" placeholder="ชื่อ" require><br>
            <input class="form-control" style="width:300px" type="text" name="lastname" placeholder="นามสกุล"
                require><br>
            <input class="form-control" style="width:300px" type="text" name="username" placeholder="ชื่อผู้ใช้"
                require><br>
            <input class="form-control" style="width:300px" type="password" name="password" placeholder="รหัสผ่าน"
                require><br>
            <input class="form-control" style="width:300px" type="password" name="c_password"
                placeholder="ยืนยันรหัสผ่าน" require><br>
            <input class="form-control" style="width:300px" type="email" name="email" placeholder="อีเมลล์" require><br>
            <input class="form-control" style="width:300px" type="email" name="c_email" placeholder="ยืนยันอีเมลล์"
                require><br>
            <input class="form-control" style="width:300px" type="text" name="tel" placeholder="เบอร์โทร" require><br>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" require>
                </div>
                <div class="col-auto">
                    <label class="form-check-label" for="exampleCheck1">ยอมรับ</label>
                    <a href="#" class="form-check-label"
                        for="exampleCheck1">เงื่อนไขข้อตกลงการใช้บริการและนโยบายความเป็นส่วนตัว</a>
                    <label class="form-check-label" for="exampleCheck1">และ</label>
                    <a href="#" class="form-check-label" for="exampleCheck1">นโยบายความเป็นส่วนตัว</a>
                    <br>
                    <label class="form-check-label" for="exampleCheck1">ของเว็ปไซต์รับดูแลผู้สูงอายุ</label>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary" style="width:100px">สมัคร</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>