<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];

        // 마지막으로 생성된 ID 가져오기
        $query = "UPDATE admin_info SET checked = 1 WHERE uid = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id]);

        return true;
    }

    echo json_encode(main());
?>
