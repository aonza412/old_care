<?php
    include "dblink.php";
    if(!empty($_POST['news_id'])){
        $news_id=$_POST['news_id'];
        $sql="DELETE FROM news WHERE news_id = $news_id";
        if(mysqli_query($link,$sql)){
            echo "<script>setInterval(function() { location.href = 'news.php'; }, 100);
            alert('ลบสำเร็จ'); </script>";
        }
    }else{
        echo "<script>setInterval(function() { location.href = 'news.php'; }, 100);
        alert('กรุณาเลือกข่าว'); </script>";
    }
    mysqli_close($link);
?>