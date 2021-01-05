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

    <script src="./src/report.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">DISC성격유형</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">DISC성격유형이란?</h5>
                    <p class="ta-center mb0">
                        일반적으로 사람들은 태어나서부터 성장하여 현재에 이르기까지 자기 나름대로의 독특한
                        동기요인에 의해 선택적으로 일정한 방식으로 행동을 취하게 된다.
                        그것은 하나의 경향성을 이루게 되어 자신이 일하고 있거나 생활하고 있는 환경에서 아주 편안한 상태로 자연스럽게 그러한 행동을 하게 된다.
                        우리는 그것을 행동패턴(Behavior Pattern) 또는 행동 스타일(Behavior Style) 이라고 한다.
                        사람들이 이렇게 행동의 경향성을 보이는 것에 대해 1928년 미국 콜롬비아대학 심리학교수인 Willam Mouston Marston 박사는
                        독자적인 행동유형모델을 만들어 설명하고 있다.
                        Marston 박사에 의하면 인간은 환경을 어떻게 인식하고 또한 그 환경 속에서 자기 개인의 힘을
                        어떻게 인식하느냐에 따라 4가지 형태로 행동을 하게 된다고 한다. 이러한 인식을 축으로 한 인간의 행동을 Marston박사는 각각 주도형,사교형,안정형,신중형, 즉 Disc 행동유형으로 부르고 있다.
                        DiSC는 인간의 행동유형(성격)을 구성하는 핵심 4새요소인
                        Dominance, InfIuence, Steadiness, Conscientiousness 의 약자입니다.
                    </p>
                    <div class="container" id="main-button-area">
                        <div class="select-button d-grid gap-2">
                            <button id="goto-test" class="btn btn-primary" type="button">홈으로</button>
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
