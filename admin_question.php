<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $info = checkAdminSession ();
    if ($info) {
        $db = connectMysql ();
        $query = "SELECT pk, title, d, i, s, c FROM question ORDER BY title DESC";

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
    <script src="./src/admin_question.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">문항 관리</h1>
                <div class="select-button d-grid gap-2">
                    <button id="goto-admin" class="btn btn-primary" type="button">홈으로</button>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">문항 관리</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col ta-center">문항</th>
                          <th scope="col ta-center">D</th>
                          <th scope="col ta-center">I</th>
                          <th scope="col ta-center">S</th>
                          <th scope="col ta-center">C</th>
                          <th scope="col ta-center"></th>
                          <th scope="col ta-center"></th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach($result as $key => $value) {
                              echo "<tr data-id=\"{$value['pk']}\">";
                              echo "    <td class=\"title\"><input type=\"text\" class=\"form-control\" value=\"{$value['title']}\"></td>";
                              echo "    <td class=\"d\"><input type=\"text\" class=\"form-control\" value=\"{$value['d']}\"></td>";
                              echo "    <td class=\"i\"><input type=\"text\" class=\"form-control\" value=\"{$value['i']}\"></td>";
                              echo "    <td class=\"s\"><input type=\"text\" class=\"form-control\" value=\"{$value['s']}\"></td>";
                              echo "    <td class=\"c\"><input type=\"text\" class=\"form-control\" value=\"{$value['c']}\"></td>";
                              echo "    <td><button type=\"button\" class=\"edit btn btn-primary\">수정</button></td>";
                              echo "    <td><button type=\"button\" class=\"delete btn btn-danger\">삭제</button></td>";
                              echo "</tr>";
                          }
                          ?>
                      </tbody>
                    </table>
                    <div class="select-button d-grid gap-2">
                        <button id="add" class="btn btn-primary w100vw" type="button">문항 추가하기</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-primary" role="alert" id="submit-success">
        등록에 성공했습니다.
    </div>
    <div class="alert alert-danger" role="alert" id="submit-failed">
        등록에 실패했습니다.
    </div>
    <template id="tr">
        <tr>
            <td class="title">
                <input type="text" class="form-control" value="">
            </td>
            <td class="d">
                <input type="text" class="form-control" value="">
            </td>
            <td class="i">
                <input type="text" class="form-control" value="">
            </td>
            <td class="s">
                <input type="text" class="form-control" value="">
            </td>
            <td class="c">
                <input type="text" class="form-control" value="">
            </td>
            <td class="blue-btn">
                <button type="button" class="submit btn btn-success">등록</button>
            </td>
            <td class="red-btn">
                <button type="button" class="delete btn btn-danger">삭제</button>
            </td>
        </tr>
    </template>
    <template id="submit-button">
        <button type="button" class="submit btn btn-primary">수정</button>
    </template>
    <template id="delete-button">
        <button type="button" class="delete btn btn-danger">삭제</button>
    </template>
</body>
</html>
<?php
}
else {
    // 로그인하지 않은 사용자가 이 화면으로 접근하려고 하면 차단한다.
    echo "<script>location.href = 'admin.php'</script>";
}
