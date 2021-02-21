<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Store</title>
</head>

<body>
<?php
$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$sql = "CREATE DATABASE IF NOT EXISTS esport";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างฐานข้อมูล: esport สำเร็จ<br>";  }
else {  die("<br>สร้างฐานข้อมูล: esport ล้มเหลว<br>" . mysqli_error($link)); }

@mysqli_select_db($link, "esport") or die(mysqli_error($link));

$sql = 	"CREATE TABLE IF NOT EXISTS news(
			 	news_id SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	news_name VARCHAR (250),
				img_content MEDIUMBLOB
				 
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: news สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: news ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS match_team(
			 	match_id SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	team1 MEDIUMINT UNSIGNED,
				team2 MEDIUMINT UNSIGNED,
				round VARCHAR (1),
				results VARCHAR (1),
 				game_id MEDIUMINT UNSIGNED
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: match_team สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: match_team ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS admin(
	admin_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
   	id VARCHAR (100),
	pass VARCHAR (100)
)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: admin สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: admin ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS team(
			 	team_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
				name_team VARCHAR (200),
			 	mem1 VARCHAR (200),
				mem2 VARCHAR (200),
				mem3 VARCHAR (200),
				mem4 VARCHAR (200),
				mem5 VARCHAR (200),
				number VARCHAR (10),
				live VARCHAR (200),
				game_id MEDIUMINT UNSIGNED,
				status VARCHAR (1)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: team สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: team ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS game(
			 	game_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
				game_name VARCHAR(100)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: game สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: game ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS images(
			 	img_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	team_id MEDIUMINT UNSIGNED,
				img_content MEDIUMBLOB
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: images สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: images ล้มเหลว<br>" . mysqli_error($link); }

@mysqli_close($link);
?>
</body>
</html>