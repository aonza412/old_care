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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <h3>รายการผู้ดูแล</h3>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <h3>รีวิวผู้ดูแล</h3>
                    </a>
                </li>
            </ul>
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                เข้าสู่ระบบ</button>
        </div>
    </div>
</nav>