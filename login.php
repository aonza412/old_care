<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<!-- Large modal -->
<style>
.nav-tabs {
    margin-bottom: 15px;
}

.sign-with {
    margin-top: 25px;
    padding: 20px;
}

div#OR {
    height: 30px;
    width: 30px;
    border: 1px solid #C2C2C2;
    border-radius: 50%;
    font-weight: bold;
    line-height: 28px;
    text-align: center;
    font-size: 12px;
    float: right;
    position: absolute;
    right: -16px;
    top: 40%;
    z-index: 1;
    background: #DFDFDF;
}
</style>
<script>
$('#myModal').modal('show');
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="material-icons" type="button" data-dismiss="modal" aria-hidden="true"
                    style="font-size:40px;color:red;">cancel</i>
            </div>
            <div class="modal-body" align="center">
                <div class="row">
                    <!-- Nav tabs -->
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active btn btn-primary" style="width:150px;" aria-current="page"
                                href="#Login" data-toggle="tab">
                                <h2>ผู้ใช้</h2>
                            </a>
                        </li>
                        <li class="nav-item">
                            <p style="width:100px;"></p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" style="width:150px;" href=" #Registration"
                                data-toggle="tab">
                                <h2>ผู้ดูแล</h2>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Login">
                            <form role="form" class="form-horizontal">
                                <br><br>
                                <h3>เข้าสู่ระบบสำหรับผู้ใช้</h3>
                                <div class="form-group">
                                    <h4 for="email" class="col-sm-10" align="left">
                                        อีเมล</h4>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email1" />
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <h4 for="exampleInputPassword1" class="col-sm-10" align="left">
                                        รหัสผ่าน</h4>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputPassword1" />
                                    </div>
                                </div><br>
                                <a href="#">
                                    <h5 align="right" class="col-sm-10">ลืมรหัสผ่าน?</h5>
                                </a><br>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <h4>เข้าสู่ระบบ</h4>
                                        </button><br><br>
                                        <a href="register_user.php">
                                            <h5>สมัครสมชิก</h5>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                            <form role="form" class="form-horizontal">
                                <br><br>
                                <h3>เข้าสู่ระบบสำหรับผู้ดูแล</h3>
                                <div class="form-group">
                                    <h4 for="email" class="col-sm-10" align="left">
                                        อีเมล</h4>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email1" require />
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <h4 for="exampleInputPassword1" class="col-sm-10" align="left">
                                        รหัสผ่าน</h4>
                                    <div class="col-sm-10">
                                        <input type="password" name="pass" class="form-control"
                                            id="exampleInputPassword1" require />
                                    </div>
                                </div><br>
                                <a href="#">
                                    <h5 align="right" class="col-sm-10">ลืมรหัสผ่าน?</h5>
                                </a><br>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <h4>เข้าสู่ระบบ</h4>
                                        </button><br><br>
                                        <a href="register_caretaker.php">
                                            <h5>สมัครสมชิก</h5>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>