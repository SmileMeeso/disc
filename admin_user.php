<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $info = checkAdminSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT uid, id, name, group_name FROM user_info ORDER BY registration_time DESC";

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
    <script src="./src/admin_user.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">회원관리</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">회원 리스트</h5>
                    <div class="select-button d-grid gap-2 mb10">
                        <button id="goto-admin" class="btn btn-primary" type="button">홈으로</button>
                    </div>
                    <div id="search-area">
                        <div class="input-group mb-3">
                          <input type="text" id="search-form" class="form-control" placeholder="이름으로 검색" aria-label="search_by_name" aria-describedby="searchs">
                        </div>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col ta-center">#</th>
                          <th scope="col ta-center">아이디</th>
                          <th scope="col ta-center">이름</th>
                          <th scope="col ta-center">과정명</th>
                          <th scope="col ta-center"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach($result as $key => $value) {
                              echo "<tr>";
                              echo "    <th>$key</th>";
                              echo "    <td class=\"id\">{$value['id']}</td>";
                              echo "    <td class=\"name\">{$value['name']}</td>";
                              echo "    <td class=\"group_name\"><input type=\"text\" class=\"form-control\" value=\"{$value['group_name']}\"></td>";
                              echo "    <td><button type=\"button\" class=\"submit btn btn-primary\" data-id=\"{$value['uid']}\">수정</button></td>";
                              echo "</tr>";
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        <div class="alert alert-primary" role="alert" id="submit-success">
            수정에 성공했습니다.
        </div>
        <div class="alert alert-danger" role="alert" id="submit-failed">
            수정에 실패했습니다.
        </div>
    </div>
    <template id="tr">
        <tr>
            <th></th>
            <td class="id"></td>
            <td class="name"></td>
            <td class="group_name"><input type="text" class="form-control" placeholder="" value=""></td>
            <td><button type="button" class="submit btn btn-primary" data-id="12">수정</button></td>
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
