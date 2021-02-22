<?php
error_reporting(0);
session_start();
if($_POST) {
    include "dblink.php";
    $email = trim($_POST['email']," ");
    $pass = trim($_POST['pass']," ");
    if(!empty($email) && !empty($pass)){
        $sql = "SELECT * FROM caretaker WHERE caretaker_email='$email' AND caretaker_password='$pass'";
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $_SESSION['username'] = $row['caretaker_username'];
            $_SESSION['status'] = "caretaker";
            $_SESSION['caretaker_id'] = $row['caretaker_id'];
            $_SESSION['email'] = $row['caretaker_email'];
            $_SESSION['caretaker_name'] = $row['caretaker_name'];
            $_SESSION['caretaker_lastname'] = $row['caretaker_lastname'];
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