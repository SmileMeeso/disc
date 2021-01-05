<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $pw = hash('sha256', $_POST['pw']);
        $name = $_POST['name'];

        // 이메일 주소 검사
        $check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $id);

        if (!$check_email) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            exit;
        }

        // 이메일 중복 검사
        $query = "SELECT id FROM admin_info WHERE id = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $check_email_dup = count($result) > 0 ? true : false;

        if ($check_email_dup) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            exit;
        }

        // 쿼리 실행
        $query = "INSERT INTO admin_info (id, password, name, last_login) VALUES (?, ?, ?, now())";

        $stmt = $db->prepare($query);
        $stmt->execute([$id, $pw, $name]);

        // 마지막으로 생성된 ID 가져오기
        $query = "SELECT uid FROM admin_info WHERE id = ? AND password = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id, $pw]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 세션 시작
        session_start();

        $token = hash('sha256', $id . date('Y-m-d', time()));

        $_SESSION['token'] = $token;

        $query = "INSERT INTO admin_session (uid, token, last_used) VALUES (?, ?,  now())";

        $stmt = $db->prepare($query);
        $stmt->execute([$result[0]['uid'], $token]);

        return true;
    }

    echo json_encode(main());
?>
