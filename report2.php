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
                    <h5 class="card-title ta-center" id="title">DISC행동유형이란?</h5>
                    <p class="ta-center mb0">
                        <table class="table table-bordered table-hover">
							<thead></thead>
								<tbody>
									<tr>
										<th class="info">유형</th>
										<th class="info">관찰되는 행동</th>
										<th class="info">타인으로부터 기대하는것</th>
										<th class="info">자신의 일에대한 태도</th>
									</tr>
									<tr>
										<td>전형적인 주도형 (D형)</td>
										<td>
											1.자기중심적 <br>
											2.듣기보다는 말한다<br>
											3.자기 주장이 강하다<br>
											4.의지가 강하다<br>
											5.힘으로 밀어붙이고 결의가 굳다<br>
										</td>
										<td>
											1.직설정 소통 <br>
											2.존경받는것 <br>
											3.자신의 리더십을 인정해주는것 <br>
											4.간섭받지 않는것 <br>
										</td>
										<td>
											1.권위와 권력 <br>
											2.명성, 위신, 신망 <br>
											3.도전성 <br>
										</td>
									</tr>
									<tr>
										<td>전형적인 사교형(I형)</td>
										<td>
											1.듣기보다는 말한다<br>
											2.때로는 감정적이다<br>
											3.설득력이 있고 정치적인 감각이 있다<br>
											4.활기차며 타인을 설득하려고 한다<br>
										</td>
										<td>
											1.친근하고 정직하며 유머러스 하다<br>
											2. 자신의 생각, 감정 상태에대 들려준다<br>
										</td>
										<td>
											1.가시적인 인정과 보상<br>
											2.승인, 동조, 인기를 받는것 <br>
										</td>
									</tr>
									<tr>
										<td>전형적인 안정형(S형)</td>
										<td>
											1.말하는것보다 질문한다<br>
											2.일관성이 있다<br>
											3.상담, 상의하는것을 선호한다<br>
											4.인내심이 있다<br>
											5.변화에 소극적이며 말에 신중을 기한다<br>
										</td>
										<td>
											1.편안한 태도<br>
											2.상냥함, 우호적이다<br>
											3.자신의 가치를 인정하며 변화는 점진적으로 진행한다.<br>
										</td>
										<td>
											1.가시적인 인정과 보상<br>
											2.승인, 동조, 인기를 받는것 <br>
										</td>
									</tr>
								<tr>
										<td>전형적인 신중형(C형)</td>
										<td>
											1.규칙/규범을 준수한다<br>
											2.구조적, 조직적이다<br>
											3.실수를 하지않도록 주의한다<br>
											4.세운 목표에 스스로 엄격하다<br>
											5.대인관계에서 외교적이다<br>
										</td>
										<td>
											1.최소한의 사교적 행동을 취한다<br>
											2.세부사항의 정확성이 있고 해동에 신뢰를 기한다<br>
											3.높은 기준<br>
										</td>
										<td>
											1.명확한 기대와 목표<br>
											2.자주성<br>
											3.전문성의 인정 프로정신<br>
										</td>
									</tr>
								</tbody>
							</table>
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
