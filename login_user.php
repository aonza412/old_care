<?php
// error_reporting(0);
session_start();
if($_POST) {
    include "dblink.php";
    $email = trim($_POST['email']," ");
    $pass = trim($_POST['pass']," ");
    if(!empty($email) && !empty($pass)){
        $sql = "SELECT * FROM user WHERE user_email='$email' AND user_password='$pass'";
        $result = mysqli_query($link, $sql);
        echo "<script>alert('1'); </script>";
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['user_username'];
            header("location: index.php");
            exit;
        }else{
            echo "<script>setInterval(function() { location.href = 'index.php'; }, 100);
            alert('เกิดข้อผืดพลาด'); </script>";
        }
    }else{
        echo "<script>setInterval(function() { location.href = 'index.php'; }, 100);
            alert('โปรดกรอกข้อมูลให้ครบ'); </script>";
    }
    mysqli_close($link);
}
?>