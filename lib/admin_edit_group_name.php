<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $group_name = $_POST['groupName'];

        // 마지막으로 생성된 ID 가져오기
        $query = "UPDATE user_info SET group_name = ? WHERE uid = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$group_name, $id]);

        return true;
    }

    echo json_encode(main());
?>
