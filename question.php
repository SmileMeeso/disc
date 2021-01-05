<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $info = checkSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT name FROM user_info WHERE uid = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$info]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <script src="./src/question_list.js"></script>
    <script src="./src/question.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">DISC테스트</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title" id="title"></h5>
                    <div class="select-button d-grid gap-2">
                        <button class="btn btn-danger w100vw mb10" type="button" data-value="1">그렇지 않다</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button class="btn btn-secondary w100vw mb10" type="button" data-value="2">약간 그렇다</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button class="btn btn-success w100vw mb10" type="button" data-value="3">대체로 그렇다</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button class="btn btn-primary w100vw" type="button" data-value="4">그렇다</button>
                    </div>
                    <p class="ta-center"><span id="now">0</span>/<span id="total"></span></p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
else {
    // 로그인하지 않은 사용자가 이 화면으로 접근하려고 하면 차단한다.
    echo "<script>location.href = 'login.php'</script>";
}
