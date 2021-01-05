<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    session_start();
    if (!checkAdminSession ()) {
?>
<html>
<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <meta http-equiv="Subject" content="DISC 성격검사를 위한 사이트" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Robots" content="noindex, nofollow" />
    <meta http-equiv="imagetoolbar" content="no">

    <title>DISC 성격검사 테스트 - 로그인</title>

    <!-- jquery -->
    <script src="./src/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="./style/bootstrap.min.css" rel="stylesheet"/>
    <script src="./src/bootstrap.min.js"></script>

    <!-- css -->
    <link href="./style/style.css" rel="stylesheet"/>

    <!-- js -->
    <script src="./src/admin_login.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">Login</h1>
                <div class="container" id="main-button-area">
                    <div class="mb-3">
                      <label for="email-input" class="form-label">이메일</label>
                      <input type="email" class="form-control" id="email-input">
                    </div>
                    <div class="mb-3">
                      <label for="password-input" class="form-label">비밀번호</label>
                      <input type="password" class="form-control" id="password-input">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">로그인</button>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" id="login-failed">
            로그인에 실패했습니다.
        </div>
    </div>
</body>
</html>
<?php
}
else {
    // 로그인 된 사용자가 로그인 화면에 접근하려고 하면 테스트 화면으로 이동한다.
    echo "<script>location.href = 'admin.php'</script>";
}
