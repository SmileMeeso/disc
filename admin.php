<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';
?>
<html>
<head>
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
    <meta http-equiv="Subject" content="DISC 성격검사를 위한 사이트" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Robots" content="noindex, nofollow" />
    <meta http-equiv="imagetoolbar" content="no">

    <title>DISC 성격검사 테스트</title>

    <!-- jquery -->
    <script src="./src/jquery.min.js"></script>

    <!-- bootstrap -->
    <link href="./style/bootstrap.min.css" rel="stylesheet"/>
    <script src="./src/bootstrap.min.js"></script>

    <!-- css -->
    <link href="./style/style.css" rel="stylesheet"/>

    <!-- js -->
    <script src="./src/admin.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">관리자 페이지</h1>
                <div class="container" id="main-button-area">
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin-login" class="btn btn-primary" type="button">관리자 로그인</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin-join" class="btn btn-primary" type="button">관리자 가입</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin-submit" class="btn btn-primary" type="button">관리자 승인</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin-user" class="btn btn-primary" type="button">회원관리</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin-result" class="btn btn-primary" type="button">결과관리</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-add-desc" class="btn btn-primary" type="button">해설 관리</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-add-question" class="btn btn-primary" type="button">문항 관리</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-group" class="btn btn-primary" type="button">그룹 관리</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
