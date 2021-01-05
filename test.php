<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    session_start();

    $info = checkSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT name, group_name FROM user_info WHERE uid = ?";

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
    <script src="./src/test.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">DISC테스트</h1>
                <h5 class="ta-center"><?php echo "{$result[0]['name']}";?>님 환영합니다!</h5>
                <h5 class="ta-center">나의 그룹은<b><?php echo "{$result[0]['group_name']}";?></b> 입니다.</h5>
                <div class="container" id="main-button-area">
                    <div class="select-button d-grid gap-2">
                        <button id="goto-test" class="btn btn-primary" type="button">DISC 테스트</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-report" class="btn btn-primary" type="button">DISC 성격유형이란?</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-report2" class="btn btn-primary" type="button">DISC 행동유형이란?</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-desc" class="btn btn-primary" type="button">DISC 성격유형별 설명</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-result" class="btn btn-primary" type="button">지난 검사 결과</button>
                    </div>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-group" class="btn btn-primary" type="button">나의 그룹 관리</button>
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
