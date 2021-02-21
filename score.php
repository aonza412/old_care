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
                <td class="table-dark"><div align="center"><br>
                    <a class="btn btn-secondary" href="index.php">กลับหน้าหลัก</a><br><br>
                </div></td>
                <td colspan="3" class="table-light">
                <table width="100%"  class="table-dark">
                        <?php 
                            include "dblink.php";
                            $sql1 = "SELECT * FROM game";
                            $result1 = mysqli_query($link, $sql1);
                            while($game = mysqli_fetch_array($result1)) {
                                $gid=$game['game_id'];
                        ?>
                            <tr>
                                <td colspan="3"><span align="center"><h3><?php echo $game['game_name'] ?></h3></span></td>
                            </tr>
                        <?php
                            include "dblink.php";
                            $sql5 = "SELECT DISTINCT round FROM match_team WHERE game_id = $gid ORDER BY round DESC";
                            $result5 = mysqli_query($link, $sql5);
                            while($round=mysqli_fetch_array($result5)){
                                $roundm=$round['round'];
                        ?>
                            <tr>
                                <td colspan="3"><span align="center"><h3>รอบที่ <?php echo $round['round'] ?></h3></span></td>
                            </tr>
                        <?php
                            include "dblink.php";
                            $sql2 = "SELECT * FROM match_team WHERE game_id = $gid AND round = $roundm";
                            $result2 = mysqli_query($link, $sql2);
                            while($match=mysqli_fetch_array($result2)){
                                $team1=$match['team1'];
                                $team2=$match['team2'];
                                $match_id=$match['match_id'];
                        ?>
                        <tr>
                            <td class="table-dark"><div align="center">
                                <?php
                                    include "dblink.php";
                                    $sql = "SELECT * FROM team WHERE team_id = $team1";
                                    $result = mysqli_query($link, $sql);
                                    $team = mysqli_fetch_array($result);
                                ?>
                            <span class="tag">ชื่อทีม:</span><?php echo $team['name_team']; ?>
                                <?php
                                    $sql = "SELECT * FROM images WHERE team_id = $team1";
                                    $r = mysqli_query($link, $sql);
                                    if(mysqli_num_rows($r) > 0) {
                                        while($img =mysqli_fetch_array($r)) { ?>
                                            <img height="150" width="150" class="d-block" src="read-image.php?id=<?=$img['img_id']?>">
                                        <?php }
                                    }
                                ?>   
                            </td>
                            <td class="table-dark"><div align="center">
                                <h1><font size="7"><strong>VS</strong></font></h1><br>
                                    <input name="team_id1" type="hidden" value="<?=$team1?>">
                                    <input name="team_id2" type="hidden" value="<?=$team2?>">
                                    <input name="match_id" type="hidden" value="<?=$match_id?>">
                                    <span><h5>
                                        <?php
                                            include "dblink.php";
                                            $sql4 = "SELECT results FROM match_team WHERE match_id = $match_id";
                                            $result4 = mysqli_query($link, $sql4);
                                            $team_1 = mysqli_fetch_array($result4);
                                            if($team_1['results']=="2"){
                                                echo "ชนะ";
                                            }else if($team_1['results']=="3"){
                                                echo "แพ้";
                                            }else if($team_1['results']=="1"){
                                                echo "ยังไม่แข่ง";
                                            }
                                        ?>				
                                    </h5></span><br>
                                </div>
                            </td>
                            <td class="table-dark"><div align="center">
                                <?php
                                        include "dblink.php";
                                        $sql = "SELECT * FROM team WHERE team_id = $team2";
                                        $result = mysqli_query($link, $sql);
                                        $team = mysqli_fetch_array($result);
                                    ?>
                                <span class="tag">ชื่อทีม:</span><?php echo $team['name_team']; ?>
                                <?php
                                    $sql = "SELECT * FROM images WHERE team_id = $team2";
                                    $r = mysqli_query($link, $sql);
                                    if(mysqli_num_rows($r) > 0) {
                                        while($img =mysqli_fetch_array($r)) { ?>
                                            <img height="150" width="150" class="d-block" src="read-image.php?id=<?=$img['img_id']?>">
                                        <?php }
                                    }
                                ?>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </table>
                </td>
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