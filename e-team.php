<?php
error_reporting(0);
session_start();
$tid=$_GET['tid'];
if($_POST) {
    include "dblink.php";
    $team_name = trim($_POST['team_name']," ");
 	$mem1 = trim($_POST['mem1']," ");
    $mem2 = trim($_POST['mem2']," ");
    $mem3 = trim($_POST['mem3']," ");
    $mem4 = trim($_POST['mem4']," ");
    $mem5 = trim($_POST['mem5']," ");
    $live = trim($_POST['live']," ");
    $gameid = $_POST['gameid'];
    $status = $_POST['status'];
    $number = trim($_POST['number']," ");   
    if(!empty($team_name) && !empty($mem1) && $gameid!="เกมส์" && !empty($mem2) && !empty($mem3) && !empty($mem4) && !empty($mem5) && !empty($live) && !empty($number)){
            if(is_uploaded_file($_FILES['file']['tmp_name']))  {
                $error =  $_FILES['file']['error'];
                if($error == 0) {
                    $sql = "REPLACE INTO team VALUES('$tid', '$team_name', '$mem1','$mem2', '$mem3', '$mem4', '$mem5', '$number', '$live','$gameid','$status')";
                    mysqli_query($link, $sql);
                    include "lib/IMager/imager.php";
                    $img = image_upload('file');
                    $img = image_to_jpg($img);
                    $img = image_resize_max($img, 400, 400); 
                    $file = image_store_db($img, "image/jpeg");
                    $team_id = mysqli_insert_id($link);
                    $sql = "UPDATE images SET img_content = '$file' WHERE team_id = '$tid'";
                    if(mysqli_query($link, $sql)){
                        echo "<script>setInterval(function() { location.href = 'store.php'; }, 100);
                        alert('เพิ่มสำเร็จ(แก้ไขรูปด้วย)'); </script>";
                    }
                }else{
                    echo "<script>alert('3');</script>";
                }
            }else{
                $sql = "REPLACE INTO team VALUES('$tid', '$team_name', '$mem1','$mem2', '$mem3', '$mem4', '$mem5', '$number', '$live','$gameid','$status')";
                if(mysqli_query($link, $sql)){
                    echo "<script>setInterval(function() { location.href = 'store.php'; }, 100);
                    alert('เพิ่มสำเร็จ(ไม่ได้แก้ไขรูป)'); </script>";
                }else{
                    echo "<script>alert('2');</script>";
                }
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <table class="table table-light">
        <thead class="thead-light">
            <tr class="table-secondary"> 
                <td width="20%" align="center"></td>
                <td width="20%" align="center"></td>
                <td width="20%" align="center"><h1><font size="7"><strong>KKU</strong></font></h1><h1><font size="7"><strong>E-Sport</strong></font></h1></td>
                <td width="20%" align="center"></td>
                <td width="20%" align="center"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-light"><div align="center"><br>
                </div></td>
                <td colspan="3" class="table-dark">
                <form method="post" enctype="multipart/form-data">
                        <div align="center">
                            <h1><strong>แก้ไขข้อมูล</strong></h1><br>
                            <?php
                                include "dblink.php";
                                $sql = "SELECT * FROM team WHERE team_id = $tid";
                                $result = mysqli_query($link, $sql);
                                $team=mysqli_fetch_array($result);
                                $gid=$team['game_id'];
                            ?>
                            <select name="gameid" class="form-control" style="width:30%" OnChange="resutName(this.value);">
                                <?php
                                $sql = "SELECT * FROM game WHERE game_id = $gid";
                                $result = mysqli_query($link, $sql);
                                while($game = mysqli_fetch_array($result)) {
                                    echo "<option value=\"{$game['game_id']}\">{$game['game_name']}</option>";
                                }
                                $sql = "SELECT * FROM game WHERE game_id != $gid";
                                $result = mysqli_query($link, $sql);
                                while($game = mysqli_fetch_array($result)) {
                                    echo "<option value=\"{$game['game_id']}\">{$game['game_name']}</option>";
                                }
                                ?>			
                            </select><br>
                            <input name="status" type="hidden" value="<?=$team['status']?>">
                            <input style="width:50%" name="team_name" class="form-control" type="text" placeholder="ชื่อทีม" value="<?php echo $team['name_team'] ?>"><br>
                            <input style="width:50%" name="mem1" class="form-control" type="text" placeholder="หัวหน้าทีม" value="<?php echo $team['mem1'] ?>"><br>
                            <input style="width:50%" name="mem2" class="form-control" type="text" placeholder="สมาชิกคนที่2" value="<?php echo $team['mem2'] ?>"><br>
                            <input style="width:50%" name="mem3" class="form-control" type="text" placeholder="สมาชิกคนที่3" value="<?php echo $team['mem3'] ?>"><br>
                            <input style="width:50%" name="mem4" class="form-control" type="text" placeholder="สมาชิกคนที่4" value="<?php echo $team['mem4'] ?>"><br>
                            <input style="width:50%" name="mem5" class="form-control" type="text" placeholder="สมาชิกคนที่5" value="<?php echo $team['mem5'] ?>"><br>
                            <input style="width:50%" name="live" class="form-control" type="text" placeholder="สถานศึกษา" value="<?php echo $team['live'] ?>"><br>
                            <input style="width:50%" name="number" class="form-control" type="number" placeholder="เบอร์โทรติดต่อ" value="<?php echo $team['number'] ?>"><br>
                            LOGO ทีม <br>
                            <input type="file" name="file"><br><br>
                            <button class="btn btn-secondary" type="submit">ตกลง</button>&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a class="btn btn-secondary" href="store.php">ยกเลิก</a>
                        </div>
                    </form>
                </td>
                <td class="table-light"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th><div align="center">**** ชายล้วน ****</div></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="bootstrap/dist/js/bootstrap.min.js"></script> 
</body>
</html>