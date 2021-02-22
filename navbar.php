<style>
.navbar {
    width: 62%;
    float: right;
    margin-top: 20px;
    margin-right: 20px;
}

.nav-link {
    color: black;
}

.navbar-brand {
    color: black;
}

.navbar {
    background-color: #BFC9CA;
}
</style>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <h2>หน้าแรก</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php 
                if(!isset($_SESSION['status']) || $_SESSION['status']=="user") { ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="caretaker_list.php">
                        <h3>รายการผู้ดูแล</h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h3>รีวิวผู้ดูแล</h3>
                    </a>
                </li>
                <?php }
                else { ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="my_histry.php">
                        <h3>ประวัติของฉัน</h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h3>งานของฉัน</h3>
                    </a>
                </li>
                <?php } ?>
            </ul>
            <?php 
            if(!isset($_SESSION['username'])) { ?>
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</button>
            <?php
            }else{ ?>
            <div class="btn-group dropstart">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?php echo $_SESSION['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a href="logout.php" class="dropdown-item" href="#">ออกจากระบบ</a></li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>