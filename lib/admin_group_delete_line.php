<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];

        $query = "DELETE FROM `groups` WHERE pk = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id]);

        return true;
    }

    echo json_encode(main());
?>
