<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $disc = $_POST['disc_type'];
        $disc_desc = $_POST['disc_desc'];

        // 마지막으로 생성된 ID 가져오기
        $query = "UPDATE disc_description SET disc_desc = ? WHERE disc = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$disc_desc, $disc]);

        return true;
    }

    echo json_encode(main());
?>
