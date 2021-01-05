<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $pw = hash('sha256', $_POST['pw']);

        // 마지막으로 생성된 ID 가져오기
        $query = "SELECT uid FROM user_info WHERE id = ? AND password = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id, $pw]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            // 세션 시작
            session_start();
            $token = hash('sha256', $id . date('Y-m-d', time()));

            $_SESSION['token'] = $token;

            $query = "INSERT INTO session (uid, token, last_used) VALUES (?, ?,  now())";

            $stmt = $db->prepare($query);
            $stmt->execute([$result[0]['uid'], $token]);

            return true;
        }
        else {
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            exit;
        }
    }

    echo json_encode(main());
?>
