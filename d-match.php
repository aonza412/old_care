<?php
    include "dblink.php";
    if(!empty($_POST['gameid'])){
        $gid=$_POST['gameid'];
        
        $sql="DELETE FROM match_team WHERE game_id = $gid";
        if(mysqli_query($link,$sql)){
            echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
            alert('ลบสำเร็จ'); </script>";
        }
    }else{
        echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
        alert('กรุณาเลือกเกมส์'); </script>";
    }
    mysqli_close($link);
?>