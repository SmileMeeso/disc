<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $group_name = $_POST['group_name'];

        $query = "UPDATE `groups` SET group_name = ? WHERE pk = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$group_name, $id]);

        return true;
    }

    echo json_encode(main());
?>
