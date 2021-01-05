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
    <script src="./src/admin_join_result.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">결과</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">관리자 가입 완료</h5>
                    <p class="ta-center mb0">가입 승인 후 이용 가능합니다.</p>
                    <div class="container" id="main-button-area">
                        <div class="select-button d-grid gap-2">
                            <button id="goto-admin" class="btn btn-primary" type="button">관리자 페이지로 돌아가기</button>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
