<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Data Store</title>
</head>

<body>
    <?php
$link = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
$sql = "CREATE DATABASE IF NOT EXISTS old_care";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างฐานข้อมูล: old_care สำเร็จ<br>";  }
else {  die("<br>สร้างฐานข้อมูล: old_care ล้มเหลว<br>" . mysqli_error($link)); }

@mysqli_select_db($link, "old_care") or die(mysqli_error($link));

$sql = 	"CREATE TABLE IF NOT EXISTS caretaker(
			 	caretaker_id SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	caretaker_username VARCHAR (30),
				caretaker_password VARCHAR (30),
				caretaker_email VARCHAR (30),
				caretaker_name VARCHAR (100),
				caretaker_lastname VARCHAR (100),
				caretaker_tel VARCHAR (10),
				caretaker_status VARCHAR (30)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: caretaker สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: caretaker ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS user(
			 	user_id SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	user_username VARCHAR (30),
				user_password VARCHAR (30),
				user_email VARCHAR (30),
				user_name VARCHAR (100),
				user_lastname VARCHAR (30),
				user_tel VARCHAR (10)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: user สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: user ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS reviews(
	reviews_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
   	user_id MEDIUMINT UNSIGNED,
	caretaker_id MEDIUMINT UNSIGNED,
	reviews_date DATE,
	reviews_score varchar(1),
	reviews_comment varchar(255)
)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: reviews สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: reviews ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS confirm(
			 	confirm_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
				caretaker_id MEDIUMINT UNSIGNED,
				date_of_birth DATE,
				sex VARCHAR (10),
				status VARCHAR (10),
				hight VARCHAR (3),
				weight VARCHAR (3),
				address VARCHAR (255),
				province VARCHAR (255),
				district VARCHAR (255),
				sub_district VARCHAR (255),
				postal_code VARCHAR (5),
				phone_home VARCHAR (10),
				phone VARCHAR (10),

				education_level VARCHAR (255),
				education_category VARCHAR (255),
				education_name VARCHAR (255),
				faculty VARCHAR (255),
				educational_background VARCHAR (255),
				branch VARCHAR (255),
				year VARCHAR (255),
				GPA VARCHAR (255),
				
				work_data_date_start DATE,
				work_data_date_end DATE,
				work_data_company VARCHAR (255),
				work_data_address VARCHAR (255),
				work_data_sarary VARCHAR (255),
				work_data_position VARCHAR (255),
				work_data_level VARCHAR (255),
				work_data_detail VARCHAR (255),

				training_data_date_start VARCHAR (255),
				training_data_date_end VARCHAR (255),
				training_data_place VARCHAR (255),
				training_data_course VARCHAR (255),
				training_data_diploma VARCHAR (255),

				ability_data_skill1 VARCHAR (255),
				ability_data_skill2 VARCHAR (255),
				ability_data_skill3 VARCHAR (255),
				ability_data_skill4 VARCHAR (255),
				ability_data_skill5 VARCHAR (255),
				ability_data_detail VARCHAR (255),
				ability_data_reference_person VARCHAR (255)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: confirm สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: confirm ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS price(
			 	price_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
				caretaker_id MEDIUMINT UNSIGNED,
				evidence_price VARCHAR (255),
				equipment_price  VARCHAR (255),
				service_price VARCHAR (255),
				price  VARCHAR (255)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: price สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: price ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS employ(
			 	employ_id MEDIUMINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	admin_id MEDIUMINT UNSIGNED,
				payment_number MEDIUMINT UNSIGNED,
				employ_date DATE,
				employ_time  VARCHAR (10),
				service_date DATE,
				service_time  VARCHAR (10),
				Data_elderly VARCHAR (255),
				note VARCHAR (255),
				address VARCHAR (255)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: employ สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: employ ล้มเหลว<br>" . mysqli_error($link); }

$sql = 	"CREATE TABLE IF NOT EXISTS admin(
			 	admin_id SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			 	admin_username VARCHAR (30),
				 admin_password VARCHAR (30),
				 admin_email VARCHAR (30),
				 admin_name VARCHAR (100),
				 admin_lastname VARCHAR (100)
			)";
if(@mysqli_query($link, $sql)) {   echo "<br>สร้างตาราง: admin สำเร็จ<br>";  }
else {  echo "<br>สร้างตาราง: admin ล้มเหลว<br>" . mysqli_error($link); }

@mysqli_close($link);
?>
</body>

</html>