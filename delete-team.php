<?php 
if($_POST['tid']){
    $tid=$_POST['tid'];
    include "dblink.php";
    $sql="DELETE FROM team WHERE team_id=$tid";
    mysqli_query($link, $sql);
    $sql="DELETE FROM images WHERE team_id=$tid";
    mysqli_query($link, $sql);
    echo "<script>setInterval(function() { location.href = 'store.php'; }, 100);
	alert('ลบสำเร็จ'); </script>";
}else{
    echo "alert('เกิดข้อผิดพลาด'); </script>";
}
mysqli_close($link);
?>