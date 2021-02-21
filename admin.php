<?php
error_reporting(0);
session_start();
include "dblink.php";
$login = $_POST['id'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM admin WHERE id = '$login' AND pass = '$pw'";
$result = mysqli_query($link, $sql);
if(!$result) {
	$msg = "เกิดข้อผิดพลาด กรุณาลองใหม่";
}
else {
	$r = mysqli_num_rows($result);
	if($r == 1) {
		$row = mysqli_fetch_array($result);
		$_SESSION['admin'] = "admin";
		header("location: store.php");
		exit;
	}
	else {
		$msg = "ท่านกำหนด Login หรือ Password ไม่ถูกต้อง";
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
                <form method="post">
                        <div align="center">
                            <h1><strong>ADMIN</strong></h1><br>
                            <input style="width:30%" name="id" class="form-control" type="text" placeholder="ID"><br>
                            <input style="width:30%" name="pw" class="form-control" type="password" placeholder="PASSWORD"><br>
                            <button class="btn btn-secondary" type="submit">ตกลง</button>&emsp;&emsp;&emsp;&emsp;&emsp;
                            <a class="btn btn-secondary" href="index.php">ยกเลิก</a>
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