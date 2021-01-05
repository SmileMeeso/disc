<?php
    require 'vendor/autoload.php';
    require 'lib/util.php';

    $db = connectMysql ();
    $query = "SELECT disc, disc_name, disc_desc FROM disc_description ORDER BY disc DESC";

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
    <script src="./src/desc.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="table w100wv h100vh">
            <div class="table-cell w100vw h100vh">
                <h1 class="ta-center">DISC 성격유형별 설명</h1>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title ta-center" id="title">DISC 성격유형별 설명</h5>
                    <div class="select-button d-grid gap-2 mb10">
                        <button id="goto-test" class="btn btn-primary" type="button">홈으로</button>
                    </div>
                    <select class="form-select w100vw mb10" id="submit_type">
                        <?php
                        foreach($result as $key => $value) {
                            if ($key != 0) {
                                echo "<option value=\"{$value['disc']}\">{$value['disc']}-{$value['disc_name']}</option>";
                            }
                            else {
                                echo "<option value=\"{$value['disc']}\" selected>{$value['disc']}-{$value['disc_name']}</option>";
                            }
                        }
                        ?>
                    </select>
                    <div>
                        <p id="text-area"></p>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-primary" role="alert" id="submit-success">
        로딩에 성공했습니다.
    </div>
    <div class="alert alert-danger" role="alert" id="submit-failed">
        로딩에 실패했습니다.
    </div>
</body>
</html>
