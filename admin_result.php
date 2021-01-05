<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $info = checkAdminSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT uid, id, name, group_name, disc, disc_name FROM user_info WHERE disc IS NOT NULL ORDER BY registration_time DESC";

        $stmt = $db->prepare($query);
        $stmt->execute([]);
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
    <script src="./src/admin_result.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">결과관리</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">결과 리스트(총: <span id="total"><?php echo count($result); ?></span>개)</h5>
                    <div id="search-area">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-select w100vw" id="search_type">
                                  <option value="group_name" selected>과정명</option>
                                  <option value="name">이름</option>
                                  <option value="disc">DISC</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                  <input type="text" id="search-form" class="form-control" placeholder="검색어를 입력해주세요." aria-label="Recipient's username" aria-describedby="button-addon2">
                                </div>
                            </div>
                          </div>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col ta-center">#</th>
                          <th scope="col ta-center">아이디</th>
                          <th scope="col ta-center">이름</th>
                          <th scope="col ta-center">과정명</th>
                          <th scope="col ta-center">타입</th>
                          <th scope="col ta-center">타입명</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach($result as $key => $value) {
                              echo "<tr>";
                              echo "    <th>$key</th>";
                              echo "    <td>{$value['id']}</td>";
                              echo "    <td>{$value['name']}</td>";
                              echo "    <td>{$value['group_name']}</td>";
                              echo "    <td>{$value['disc']}</td>";
                              echo "    <td>{$value['disc_name']}</td>";
                              echo "</tr>";
                          }
                          ?>
                      </tbody>
                    </table>
                    <div class="select-button d-grid gap-2">
                        <button id="goto-admin" class="btn btn-primary w100vw" type="button">홈으로</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <template id="tr">
        <tr>
            <th></th>
            <td class="id"></td>
            <td class="name"></td>
            <td class="group_name"></td>
            <td class="disc"></td>
            <td class="disc_name"></td>
        </tr>
    </template>
</body>
</html>
<?php
}
else {
    // 로그인하지 않은 사용자가 이 화면으로 접근하려고 하면 차단한다.
    echo "<script>location.href = 'admin.php'</script>";
}
