<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $query = "SELECT title, d AS D, i AS I, s AS S, c AS C FROM question";

        $stmt = $db->prepare($query);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    echo json_encode(main());
?>
