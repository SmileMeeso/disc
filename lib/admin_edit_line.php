<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $title = $_POST['title'];
        $d = $_POST['d'];
        $i = $_POST['i'];
        $s = $_POST['s'];
        $c = $_POST['c'];

        $query = "UPDATE question SET title = ?, d = ?, i = ?, s = ?, c = ? WHERE pk = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$title, $d, $i, $s, $c, $id]);

        return true;
    }

    echo json_encode(main());
?>
