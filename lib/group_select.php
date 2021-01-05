<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();
        $uid = checkSession ();

        $group_name = $_POST['group_name'];

        $query = "UPDATE user_info SET group_name = ? WHERE uid = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$group_name, $uid]);

        return true;
    }

    echo json_encode(main());
?>
