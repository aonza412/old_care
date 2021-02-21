<?php
error_reporting(0);
include "dblink.php";
if($_POST['news']){
    $news_name=$_POST['news'];
    $sql = "SELECT * FROM news";
    $result = mysqli_query($link, $sql);
    $news=mysqli_fetch_array($result);
    if($news['news_name']!=$news_name){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $error =  $_FILES['file']['error'];
            if($error == 0) {
                include "lib/IMager/imager.php";
                $img = image_upload('file');
                $img = image_to_jpg($img);
                $img = image_resize_max($img, 800, 800);
                $file = image_store_db($img, "image/jpeg");
                $sql = "REPLACE INTO news VALUES('', '$news_name', '$file')";
                if(mysqli_query($link, $sql)){
                    echo "<script>setInterval(function() { location.href = 'news.php'; }, 100);
                    alert('เพิ่มข่าวสำเร็จ'); </script>";
                }else{
                    echo "<script>alert('3');</script>";
                }
            }  
        }else{
            echo "<script>alert('กรุณาใส่โปสเตอร์');</script>";
        }
    }
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
    <script src="js/jquery-2.1.1.min.js"> </script>
	<script src="js/jquery-ui.min.js"> </script>
	<script src="js/jquery.form.min.js"> </script>
	<script src="js/jquery.blockUI.js"> </script>
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
                <td class="table-dark">
                    <div align="center">
                        <br><a class="btn btn-secondary" href="store.php">กลับหน้าหลัก</a><br><br>
                    </div>
                </td>
                <td colspan="3" class="table-light">
                <table width="100%"  class="table-dark">
					<tr>
                    <div align="center"><h1><strong>เพิ่มเกมส์</strong></h1><br></div>   
						<td>
                            <form method="post" enctype="multipart/form-data">
                                <div align="center">
                                <input name="news" style="width:30%" type="text" class="form-control" placeholder="ใส่ชื่อข่าว"><br>
                                    <span>เลือกโปสเตอร์ข่าว</span>
                                    <input name="file" type="file" style="width:30%" class="form-control-file"><br>
                                    <button type="submit" class="btn btn-secondary">เพิ่ม</button><br><br>
                                </div>
                            </form>
                            <form method="post" action="d-news.php">
                                <div align="center">
                                    <select name="news_id" class="form-control" style="width:30%" OnChange="resutName(this.value);">
                                        <option>ข่าวที่มี</option> 
                                    <?php
                                    include "dblink.php";
                                    $sql = "SELECT * FROM news";
                                    $result = mysqli_query($link, $sql);
                                    while($news = mysqli_fetch_array($result)) {
                                        echo "<option value=\"{$news['news_id']}\">{$news['news_name']}</option>";
                                    }
                                    ?>			
                                    </select><br>
                                    <button type="submit" class="btn btn-secondary" onClick="return confirm('ต้องการลบข่าวหรือไม่')">ลบ</button>
                                </div>
                            </form>
						</tr>
					</table></td>
                <td class="table-dark"></td>
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