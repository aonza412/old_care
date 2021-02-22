<?php
session_start();
// error_reporting(0);
$caretaker_id=$_SESSION['caretaker_id'];
if($_POST) {
    include "dblink.php";
    $confirm_id = $_POST['confirm_id'];
    ///////////////////////
    
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    //////////////////////
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $hight = $_POST['hight'];
    $weight = $_POST['weight'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $sub_district = $_POST['sub_district'];
    $postal_code = $_POST['postal_code'];
    $phone_home = $_POST['phone_home'];
    $phone = $_POST['phone'];
    ///////////////////////
    $education_level = $_POST['education_level'];
    $education_category = $_POST['education_category'];
    $education_name = $_POST['education_name'];
    $faculty = $_POST['faculty'];
    $educational_background = $_POST['educational_background'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $GPA = $_POST['GPA'];
    ///////////////////////
    $work_data_date_start = $_POST['work_data_date_start'];
    $work_data_date_end = $_POST['work_data_date_end'];
    $work_data_company = $_POST['work_data_company'];
    $work_data_address = $_POST['work_data_address'];
    $work_data_sarary = $_POST['work_data_sarary'];
    $work_data_position = $_POST['work_data_position'];
    $work_data_level = $_POST['work_data_level'];
    $work_data_detail = $_POST['work_data_detail'];
    ///////////////////////
    $training_data_date_start = $_POST['training_data_date_start'];
    $training_data_date_end = $_POST['training_data_date_end'];
    $training_data_place = $_POST['training_data_place'];
    $training_data_course = $_POST['training_data_course'];
    $training_data_diploma = $_POST['training_data_diploma'];
    ///////////////////////
    $ability_data_skill1 = $_POST['ability_data_skill1'];
    $ability_data_skill2 = $_POST['ability_data_skill2'];
    $ability_data_skill3 = $_POST['ability_data_skill3'];
    $ability_data_skill4 = $_POST['ability_data_skill4'];
    $ability_data_skill5 = $_POST['ability_data_skill5'];
    $ability_data_detail = $_POST['ability_data_detail'];
    $ability_data_reference_person = $_POST['ability_data_reference_person'];
    ///////////////////////
    $sql1 = "UPDATE caretaker SET caretaker_email='$email',caretaker_name='$firstname',caretaker_lastname='$lastname' WHERE caretaker_id='$caretaker_id' ";
    if(mysqli_query($link, $sql1)){
        $sql = "REPLACE INTO confirm VALUES($confirm_id,'$caretaker_id','$birthday','$sex','$status','$hight','$weight','$address','$province','$district',
        '$sub_district','$postal_code','$phone_home','$phone','$education_level','$education_category','$education_name','$faculty',
        '$educational_background','$branch','$year','$GPA','$work_data_date_start','$work_data_date_end','$work_data_company','$work_data_address',
        '$work_data_sarary','$work_data_position','$work_data_level','$work_data_detail','$training_data_date_start','$training_data_date_end','$training_data_place',
        '$training_data_course','$training_data_diploma','$ability_data_skill1','$ability_data_skill2','$ability_data_skill3','$ability_data_skill4',
        '$ability_data_skill5','$ability_data_detail','$ability_data_reference_person')";
        if(mysqli_query($link, $sql)){
            echo "<script>setInterval(function() { location.href = 'my_histry.php'; }, 100);
            alert('บันทึกสำเร็จ'); </script>";
        }else{
            echo "<script>alert('เกิดข้อผืดพลาด');</script>";
        }
    }else{
            echo "<script>alert('เกิดข้อผืดพลาด');</script>";
        }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Old Care</title>
    <style>
    body {
        background-image: url('bg_2.png');
        background-repeat: no-repeat;
        background-size: cover;

    }

    .menu-histry {
        position: fixed;
        margin: "auto";
        margin-top: 200px;
        margin-left: 200px;
        margin-right: 1400px;
    }

    .filed-histry {
        margin: "auto";
        margin-top: 100px;
        margin-left: 800px;
    }

    #learn_data {
        display: none;
    }

    #work_data {
        display: none;
    }

    #training_data {
        display: none;
    }

    #ability_data {
        display: none;
    }

    #photo_data {
        display: none;
    }
    </style>
    <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })

    function togle_own_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "block";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "none";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "none";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "none";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "none";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "none";
    }

    function togle_learn_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "none";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "block";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "none";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "none";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "none";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "none";
    }

    function togle_work_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "none";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "none";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "block";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "none";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "none";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "none";
    }

    function togle_training_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "none";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "none";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "none";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "block";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "none";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "none";
    }

    function togle_ability_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "none";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "none";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "none";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "none";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "block";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "none";
    }

    function togle_photo_data() {
        var own_data = document.getElementById("own_data");
        own_data.style.display = "none";
        var learn_data = document.getElementById("learn_data");
        learn_data.style.display = "none";
        var work_data = document.getElementById("work_data");
        work_data.style.display = "none";
        var training_data = document.getElementById("training_data");
        training_data.style.display = "none";
        var ability_data = document.getElementById("ability_data");
        ability_data.style.display = "none";
        var photo_data = document.getElementById("photo_data");
        photo_data.style.display = "block";
    }
    </script>
</head>


<body>
    <?php include 'check_login.php'; ?>
    <?php include 'navbar.php'; ?><br>
    <?php 
        include "dblink.php";
        $sql2 = "SELECT * FROM confirm,caretaker WHERE confirm.caretaker_id='$caretaker_id' and caretaker.caretaker_id='$caretaker_id'";
        $result = mysqli_query($link, $sql2);
        $data = mysqli_fetch_array($result);
    ?>
    <form action="" method="post">
        <input type="hidden" name="confirm_id" value="<?= $data['confirm_id'] ?>">
        <div class="menu-histry">
            <nav class="nav flex-column">
                <a class="btn btn-primary" onclick="togle_own_data()">ข้อมูลส่วนบุคลล</a><br>
                <a class="btn btn-primary" onclick="togle_learn_data()">ประวัติการศึกษา</a><br>
                <a class="btn btn-primary" onclick="togle_work_data()">ประวัติการทำงาน/ฝึกงาน</a><br>
                <a class="btn btn-primary" onclick="togle_training_data()">ประวัติการฝึกอบรม</a><br>
                <a class="btn btn-primary" onclick="togle_ability_data()">ความสามารถ ผลงาน</a><br>
                <a class="btn btn-primary" onclick="togle_photo_data()">รูปถ่าย</a><br><br>
                <button class="btn btn-success" type="submit">บันทึกข้อมูล</button><br>
            </nav>
        </div>
        <div class="filed-histry">
            <div class="own_data" id="own_data">
                <h2>ข้อมูลส่วนบุคลล</h2><br>
                <div class="form-group row">
                    <h4 for="email" class="col-sm-1" align="left">อีเมล</h4>
                    <div class="col-sm-4">
                        <input required type="email" name="email" class="form-control"
                            value=<?= $data['caretaker_email'] ?> />
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="firstname" class="col-sm-1" align="left">ชื่อ</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="firstname" class="form-control" id="firstname"
                            value=<?= $data['caretaker_name'] ?> />
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="lastname" class="col-sm-1" align="left">นามสกุล</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="lastname" class="form-control" id="lastname"
                            value=<?= $data['caretaker_lastname'] ?> />
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="birthday" class="col-sm-1" align="left">วันเกิด</h4>
                    <div class="col-sm-4">
                        <input required type="date" name="birthday" class="form-control" id="birthday"
                            value=<?= $data['date_of_birth'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="sex" class="col-sm-2" align="left">เพศ</h4>
                    <div class="col-sm-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <?php if($data['sex']=="ชาย"){ ?>
                                <input required type="radio" value="ชาย" name="sex" class="form-check-input" checked
                                    required>
                                <?php }else{ ?>
                                <input required type="radio" value="ชาย" name="sex" class="form-check-input" required>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <label class="form-check-label" for="exampleCheck1">ชาย</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <?php if($data['sex']=="หญิง"){ ?>
                                <input required type="radio" value="หญิง" name="sex" class="form-check-input" checked
                                    required>
                                <?php }else{ ?>
                                <input required type="radio" value="หญิง" name="sex" class="form-check-input" required>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <label class="form-check-label" for="exampleCheck1">หญิง</label>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="status" class="col-sm-2" align="left">สถานะสมรส</h4>
                    <div class="col-sm-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <?php if($data['status']=="โสด"){ ?>
                                <input required type="radio" value="โสด" name="status" class="form-check-input" checked
                                    required>
                                <?php }else{ ?>
                                <input required type="radio" value="โสด" name="status" class="form-check-input"
                                    required>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <label class="form-check-label" for="exampleCheck1">โสด</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <?php if($data['status']=="แต่งงาน"){ ?>
                                <input required type="radio" value="แต่งงาน" name="status" class="form-check-input"
                                    checked required>
                                <?php }else{ ?>
                                <input required type="radio" value="แต่งงาน" name="status" class="form-check-input"
                                    required>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <label class="form-check-label" for="exampleCheck1">แต่งงาน</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <?php if($data['status']=="อย่าร้าง"){ ?>
                                <input required type="radio" value="อย่าร้าง" name="status" class="form-check-input"
                                    checked required>
                                <?php }else{ ?>
                                <input required type="radio" value="อย่าร้าง" name="status" class="form-check-input"
                                    required>
                                <?php } ?>
                            </div>
                            <div class="col-auto">
                                <label class="form-check-label" for="exampleCheck1">อย่าร้าง</label>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="hight" class="col-sm-1" align="left">ส่วนสูง</h4>
                    <div class="col-sm-2">
                        <input required type="number" name="hight" class="form-control" id="hight"
                            value=<?= $data['hight'] ?>>
                    </div>
                    <h4 for="hight" class="col-sm-2" align="left">เซนติเมตร</h4>
                    <h4 for="weight" class="col-sm-2" align="right">น้ำหนัก</h4>
                    <div class="col-sm-2">
                        <input required type="number" name="weight" class="form-control" id="weight"
                            value=<?= $data['weight'] ?>>
                    </div>
                    <h4 for="weight" class="col-sm-2" align="left">กิโลกรัม</h4>
                </div><br>
                <div class="form-group row">
                    <h4 for="address" class="col-sm-2" align="left">ที่อยู่ปัจจุบัน</h4>
                    <div class="col-sm-6">
                        <input required type="text" name="address" class="form-control" id="address"
                            value=<?= $data['address'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="province" class="col-sm-2" align="left">จังหวัด</h4>
                    <div class="col-sm-6">
                        <input required type="text" name="province" class="form-control" id="province"
                            value=<?= $data['province'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="district" class="col-sm-2" align="left">เขต/อำเภอ</h4>
                    <div class="col-sm-6">
                        <input required type="text" name="district" class="form-control" id="district"
                            value=<?= $data['district'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="sub_district" class="col-sm-2" align="left">แขวง/ตำบล</h4>
                    <div class="col-sm-6">
                        <input required type="text" name="sub_district" class="form-control" id="sub_district"
                            value=<?= $data['sub_district'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="postal_code" class="col-sm-2" align="left">รหัสไปรษณีย์</h4>
                    <div class="col-sm-6">
                        <input required type="text" name="postal_code" class="form-control" id="postal_code"
                            value=<?= $data['postal_code'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="phone_home" class="col-sm-2" align="left">โทรศัพท์บ้าน</h4>
                    <div class="col-sm-6">
                        <input required type="text" maxlength="10" minlength="10" name="phone_home" class="form-control"
                            id="phone_home" value=<?= $data['phone_home'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="phone" class="col-sm-2" align="left">โทรศัพท์มือถือ</h4>
                    <div class="col-sm-6">
                        <input required type="text" maxlength="10" minlength="10" name="phone" class="form-control"
                            id="phone" value=<?= $data['phone'] ?>>
                    </div>
                </div><br>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="learn_data" id="learn_data">
                <h2>ข้อมูลการศึกษา</h2><br>
                <div class="form-group row">
                    <h4 for="education_level" class="col-sm-2" align="left">ระดับการศึกษา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="education_level" class="form-control" id="education_level"
                            value=<?= $data['education_level'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="education_category" class="col-sm-2" align="left">หมวดการศึกษา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="education_category" class="form-control"
                            id="education_category" value=<?= $data['education_category'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="education_name" class="col-sm-2" align="left">ชื่อสถานศึกษา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="education_name" class="form-control" id="education_name"
                            value=<?= $data['education_name'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="faculty" class="col-sm-2" align="left">คณะ</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="faculty" class="form-control" id="faculty"
                            value=<?= $data['faculty'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="educational_background" class="col-sm-2" align="left">วุฒิการศึกษา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="educational_background" class="form-control"
                            id="educational_background" value=<?= $data['educational_background'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="branch" class="col-sm-2" align="left">สาขาวิชา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="branch" class="form-control" id="branch"
                            value=<?= $data['branch'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="year" class="col-sm-2" align="left">ปีการศึกษา</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="year" class="form-control" id="year"
                            value=<?= $data['year'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="GPA" class="col-sm-2" align="left">เกรดเฉลี่ย</h4>
                    <div class="col-sm-4">
                        <input required type="number" name="GPA" class="form-control" id="GPA"
                            value=<?= $data['GPA'] ?>>
                    </div>
                </div><br>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="work_data" id="work_data">
                <h2>ประวัติการทำงาน/ฝึกงาน</h2><br>
                <div class="form-group row">
                    <h4 class="col-sm-2" align="left">ระยะเวลา</h4>
                    <h4 for="work_data_date_start" class="col-sm-1" align="right">ตั้งแต่</h4>
                    <div class="col-sm-2">
                        <input required type="date" name="work_data_date_start" class="form-control"
                            id="work_data_date_start" value=<?= $data['work_data_date_start'] ?>>
                    </div>
                    <h4 for="work_data_date_end" class="col-sm-1" align="right">ถึง</h4>
                    <div class="col-sm-2">
                        <input required type="date" name="work_data_date_end" class="form-control"
                            value=<?= $data['work_data_date_end'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="work_data_company" class="col-sm-2" align="left">บริษัท</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="work_data_company" class="form-control"
                            value=<?= $data['work_data_company'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="work_data_address" class="col-sm-2" align="left">ที่อยู่-ติดต่อ</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="work_data_address" class="form-control"
                            value=<?= $data['work_data_address'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="work_data_sarary" class="col-sm-2" align="left">เงินเดือน</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="work_data_sarary" class="form-control"
                            value=<?= $data['work_data_sarary'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="work_data_position" class="col-sm-2" align="left">ตำแหน่ง</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="work_data_position" class="form-control"
                            value=<?= $data['work_data_position'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="work_data_level" class="col-sm-2" align="left">ระดับ</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="work_data_level" class="form-control"
                            value=<?= $data['work_data_level'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <h4 align="left">หน้าที่</h4>
                        <h4 align="left">ความรับผิดชอบ</h4>
                        <h4 align="left">และผลงาน</h4>
                    </div>
                    <div class="col-sm-4">
                        <textarea required class="form-control" name="work_data_detail" id="" cols="50" rows="10"
                            style="resize: none;"><?= $data['work_data_detail'] ?></textarea>
                    </div>
                </div><br>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="training_data" id="training_data">
                <h2>ประวัติการฝึกอบรม</h2><br>
                <div class="form-group row">
                    <h4 class="col-sm-2" align="left">ระยะเวลา</h4>
                    <h4 for="training_data_date_start" class="col-sm-1" align="right">ตั้งแต่</h4>
                    <div class="col-sm-2">
                        <input required type="date" name="training_data_date_start" class="form-control"
                            value=<?= $data['training_data_date_start'] ?>>
                    </div>
                    <h4 for="training_data_date_end" class="col-sm-1" align="right">ถึง</h4>
                    <div class="col-sm-2">
                        <input required type="date" name="training_data_date_end" class="form-control"
                            value=<?= $data['training_data_date_end'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <h4 align="left">สถาบัน/</h4>
                        <h4 align="left">หน่วยฝึก/</h4>
                        <h4 align="left">บริษัท</h4>
                    </div>
                    <div class="col-sm-4">
                        <input required type="text" name="training_data_place" class="form-control"
                            value=<?= $data['training_data_place'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 class="col-sm-2" align="left">หลักสูตร</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="training_data_course" class="form-control"
                            value=<?= $data['training_data_course'] ?>>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 class="col-sm-2" align="left">ประกาศนียบัตร/วุฒิบัตร</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="training_data_diploma" class="form-control"
                            value=<?= $data['training_data_diploma'] ?>>
                    </div>
                </div><br>
                <br>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="ability_data" id="ability_data">
                <h2>ความสามารถ ผลงาน</h2><br>
                <div class="form-group row">
                    <h4 class="col-sm-2" align="left">ความสามารถพิเศษ/อื่นๆ</h4>
                    <div class="col-sm-4">
                        <input required type="text" name="ability_data_skill1" class="form-control"
                            value=<?= $data['ability_data_skill1'] ?>><br>
                        <input required type="text" name="ability_data_skill2" class="form-control"
                            value=<?= $data['ability_data_skill2'] ?>><br>
                        <input required type="text" name="ability_data_skill3" class="form-control"
                            value=<?= $data['ability_data_skill3'] ?>><br>
                        <input required type="text" name="ability_data_skill4" class="form-control"
                            value=<?= $data['ability_data_skill4'] ?>><br>
                        <input required type="text" name="ability_data_skill5" class="form-control"
                            value=<?= $data['ability_data_skill5'] ?>><br>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="email" class="col-sm-2" align="left">ผลงาน เกียรติประวัติ และประสบการณ์อื่นๆ</h4>
                    <div class="col-sm-6">
                        <textarea required name="ability_data_detail" id="" cols="20" class="form-control" rows="10"
                            style="resize: none;"><?= $data['ability_data_detail'] ?></textarea>
                    </div>
                </div><br>
                <div class="form-group row">
                    <h4 for="email" class="col-sm-2" align="left">บุคคลอ้างอิง</h4>
                    <div class="col-sm-6">
                        <textarea required name="ability_data_reference_person" id="" cols="20" class="form-control"
                            rows="10" style="resize: none;"><?= $data['ability_data_reference_person'] ?></textarea>
                    </div>
                </div>
                <br>
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="photo_data" id="photo_data">
                <h2>รูปถ่าย</h2><br>
                <div class="form-group row">

                </div>
                <br>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>

</html>