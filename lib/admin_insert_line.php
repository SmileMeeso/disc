<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $title = $_POST['title'];
        $d = $_POST['d'];
        $i = $_POST['i'];
        $s = $_POST['s'];
        $c = $_POST['c'];

        $query = "INSERT INTO question (title, d, i, s, c) VALUES (?, ?, ?, ?, ?)";

        $stmt = $db->prepare($query);
        $stmt->execute([$title, $d, $i, $s, $c]);

        $query = "SELECT pk FROM question ORDER BY pk DESC LIMIT 1";

        $stmt = $db->prepare($query);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['pk'];

        return $result;
    }

    echo json_encode(main());
?>
