<?php
    require 'vendor/autoload.php';
?>
<html>
<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <meta http-equiv="Subject" content="DISC 성격검사를 위한 사이트" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Robots" content="noindex, nofollow" />
    <meta http-equiv="imagetoolbar" content="no">

    <title>DISC 성격검사 테스트 - 회원가입</title>

    <!-- jquery -->
    <script src="./src/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="./style/bootstrap.min.css" rel="stylesheet"/>
    <script src="./src/bootstrap.min.js"></script>

    <!-- css -->
    <link href="./style/style.css" rel="stylesheet"/>

    <!-- js -->
    <script src="./src/admin_join.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">회원가입</h1>
                <div class="container" id="main-button-area">
                    <div class="mb-3">
                      <label for="email-input" class="form-label">이메일</label>
                      <input type="email" class="form-control" id="email-input">
                    </div>
                    <div class="mb-3">
                      <label for="password-input" class="form-label">비밀번호</label>
                      <input type="password" class="form-control" id="password-input">
                    </div>
                    <div class="mb-3">
                      <label for="name-input" class="form-label">이름</label>
                      <input type="text" class="form-control" id="name-input">
                    </div>
                    <button class="btn btn-primary" id="submit">회원가입</button>
                </div>
            </div>
        </div>
        <div class="alert alert-warning" role="alert" id="email-check-alarm">
            올바른 이메일 주소를 입력해주세요.
        </div>
        <div class="alert alert-warning" role="alert" id="email-dup-alarm">
            이메일 주소는 중복될 수 없습니다.
        </div>
        <div class="alert alert-warning" role="alert" id="password-check-alarm">
            비밀번호는 필수값입니다.
        </div>
        <div class="alert alert-warning" role="alert" id="name-check-alarm">
            이름은 10자 이내여야 합니다.
        </div>
        <div class="alert alert-warning" role="alert" id="name-check2-alarm">
            이름은 필수값입니다.
        </div>
        <div class="alert alert-warning" role="alert" id="name-check-alarm">
            이름은 10자 이내여야 합니다.
        </div>
        <div class="alert alert-danger" role="alert" id="login-failed">
            로그인에 실패했습니다.
        </div>
    </div>
</body>
</html>
