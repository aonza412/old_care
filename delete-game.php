<?php 
if($_POST['gameid']){
    $gameid=$_POST['gameid'];
    include "dblink.php";
    $sql1="SELECT * FROM team WHERE game_id=$gameid";
    $result=mysqli_query($link, $sql1);
    while($team=mysqli_fetch_array($result)){
        $team_id=$team['team_id'];
        $sql="DELETE FROM images WHERE team_id=$team_id";
        mysqli_query($link, $sql);
        $sql="DELETE FROM team WHERE team_id=$team_id";
        mysqli_query($link, $sql);
    }
    $sql="DELETE FROM game WHERE game_id=$gameid";
    mysqli_query($link, $sql);
    echo "<script>setInterval(function() { location.href = 'add-game.php'; }, 100);
	alert('ลบสำเร็จ'); </script>";
}else{
    echo "<script>setInterval(function() { location.href = 'add-game.php'; }, 100);
    alert('กรุณาเลือกเกมส์'); </script>";
}
mysqli_close($link);
?>