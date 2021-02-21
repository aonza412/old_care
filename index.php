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
                    <a class="btn btn-secondary" href="score.php">ตารางการแข่งขัน</a><br><br>
                    <a class="btn btn-secondary" href="showteam.php">ข้อมูลทีมที่เข้าร่วม</a><br><br>
                    <a class="btn btn-secondary" href="register.php">สมัครเข้าร่วมการแข่งขัน</a><br><br>
                </div></td>
                <td class="table-light" colspan="3">
                    <div align="center">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                    include "dblink.php";
                                    include "lib/IMGallery/imgallery-no-jquery.php";
                                    $sql = "SELECT * FROM news";
                                    $r = mysqli_query($link, $sql);
                                    if(mysqli_num_rows($r) > 0) {
                                        gallery_thumb_width(10);
                                        gallery_thumb_height(10);
                                        $news =mysqli_fetch_array($r);
                                        $id=$news['news_id'];
                                        ?>
                                        <div class="carousel-item active">    
                                            <img height="400" class="d-block" src="read-news.php?id=<?=$news['news_id']?>">
                                        </div>
                                        <?php
                                        $sql = "SELECT * FROM news WHERE news_id != $id";
                                        $r = mysqli_query($link, $sql);
                                         while($news =mysqli_fetch_array($r)) { ?>
                                            <div class="carousel-item">    
                                            <img height="400" width="600" class="d-block" src="read-news.php?id=<?=$news['news_id']?>">
                                            </div>
                                        <?php }
                                    } 
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>   
                    </div>
                </td>
                <td class="table-dark">
                <div align="center"><br>
                    <a class="btn btn-secondary" href="admin.php">For Admin</a><br><br>
                </div>
                </td>
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