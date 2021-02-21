<?php
error_reporting(0);
if($_POST['game_name']){
    $game_name=$_POST['game_name'];
    include "dblink.php";
    $sql = "SELECT * FROM game";
    $result = mysqli_query($link, $sql);
    $game=mysqli_fetch_array($result);
    if($game['game_name']!=$game_name){
        $sql="INSERT INTO game VALUES('','$game_name')";
        if(mysqli_query($link, $sql)){
            echo "<script>alert('เพิ่มสำเร็จ'); </script>";
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
                    <div align="center"><h1><strong>RANDOM</strong></h1><br></div>   
						<td>
                            <form method="post" action="random.php">
                                <div align="center">
                                    <select name="gameid" class="form-control" style="width:30%" OnChange="resutName(this.value);">
                                        <option value="">เกมส์ที่มี</option> 
                                    <?php
                                    include "dblink.php";
                                    $sql = "SELECT * FROM game";
                                    $result = mysqli_query($link, $sql);
                                    while($game = mysqli_fetch_array($result)) {
                                        echo "<option value=\"{$game['game_id']}\">{$game['game_name']}</option>";
                                    }
                                    ?>			
                                    </select><br>
                                    <button type="submit" class="btn btn-secondary">จับคู่</button>
                                </div>
                            </form><br><br>
                            <form method="post" action="d-match.php">
                                <div align="center">
                                    <select name="gameid" class="form-control" style="width:30%" OnChange="resutName(this.value);">
                                        <option value="">เกมส์ที่มี</option> 
                                    <?php
                                    include "dblink.php";
                                    $sql = "SELECT * FROM game";
                                    $result = mysqli_query($link, $sql);
                                    while($game = mysqli_fetch_array($result)) {
                                        echo "<option value=\"{$game['game_id']}\">{$game['game_name']}</option>";
                                    }
                                    ?>			
                                    </select><br>
                                    <button type="submit" class="btn btn-secondary">ลบตาราง</button>
                                </div>
                            </form>
						</td>
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