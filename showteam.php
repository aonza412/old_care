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
                <td width="20%" align="center">
                    <h1>
                        <font size="7"><strong>KKU</strong></font>
                    </h1>
                    <h1>
                        <font size="7"><strong>E-Sport</strong></font>
                    </h1>
                </td>
                <td width="20%" align="center"></td>
                <td width="20%" align="center"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="table-dark">
                    <div align="center">
                        <br><a class="btn btn-secondary" href="index.php">กลับหน้าหลัก</a><br><br>
                    </div>
                </td>
                <td colspan="3" class="table-light">
                    <table width="100%" class="table-dark">
                        <div align="center">
                            <h1><strong>ข้อมูลทีม</strong></h1><br>
                        </div>
                        <?php 
                                include "dblink.php";
                                $sql1 = "SELECT * FROM game";
                                $result1 = mysqli_query($link, $sql1);
                                while($game = mysqli_fetch_array($result1)) {
                                    $gid=$game['game_id'];
                            ?>
                        <tr>
                            <td colspan="2"><span align="center">
                                    <h3><?php echo $game['game_name'] ?></h3>
                                </span></td>
                        </tr>
                        <?php
                                    $sql = "SELECT * FROM team WHERE game_id = $gid";
                                    $result = mysqli_query($link, $sql);
                                    while($team = mysqli_fetch_array($result)) {
                                        $id=$team['team_id'];
                                ?>
                        <tr>
                            <td>
                                <div align="center">
                                    <span class="tag">ชื่อทีม:</span><?php echo $team['name_team']; ?>
                                    <?php
                                                    $sql = "SELECT * FROM images WHERE team_id = {$team['team_id']}";
                                                    $r = mysqli_query($link, $sql);
                                                    if(mysqli_num_rows($r) > 0) {
                                                        while($img =mysqli_fetch_array($r)) { ?>
                                    <img height="150" width="150" class="d-block"
                                        src="read-image.php?id=<?=$img['img_id']?>">
                                    <?php }
                                                    }
                                                ?>
                                </div>
                            </td>
                            <td>
                                <span class="tag">หัวหน้าทีม : </span><?php echo $team['mem1']; ?><br>
                                <span class="tag">สมาชิกคนที่2 : </span><?php echo $team['mem2']; ?> <br>
                                <span class="tag">สมาชิกคนที่3 : </span><?php echo $team['mem3']; ?> <br>
                                <span class="tag">สมาชิกคนที่4 : </span><?php echo $team['mem4']; ?> <br>
                                <span class="tag">สมาชิกคนที่5 : </span><?php echo $team['mem5']; ?> <br>
                                <span class="tag">มาจาก : </span><?php echo $team['live']; ?> <br>
                            </td>
                        </tr>
                        <?php
                                    }
                                ?>
                        <?php
                                }
                            ?>
                    </table>
                </td>
                <td class="table-dark"></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th>
                    <div align="center">**** ชายล้วน ****</div>
                </th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>