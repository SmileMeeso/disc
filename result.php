<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $info = checkSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT d, i, s, c, type, type_ FROM result WHERE uid = ? ORDER BY registration_time DESC";

        $stmt = $db->prepare($query);
        $stmt->execute([$info]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
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
    <script src="./src/result_list.js"></script>
    <script src="./src/result.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">결과</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">당신의 행동유형은 <?php echo "{$result['type']}";?>입니다.</h5>
                    <p class="ta-center mb0">당신의 프로파일은 <?php echo "{$result['type_']}";?>입니다.</p>
                    <div class="container" id="score-area">
                        <ul>
                            <li>D: <?php echo "{$result['d']}";?>점</li>
                            <li>I: <?php echo "{$result['i']}";?>점</li>
                            <li>S: <?php echo "{$result['s']}";?>점</li>
                            <li>C: <?php echo "{$result['c']}";?>점</li>
                        </ul>
                    </div>
                    <div class="container" id="main-button-area">
                        <div class="select-button d-grid gap-2">
                            <button id="goto-test" class="btn btn-primary" type="button">다시하기</button>
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
                    </div>
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
