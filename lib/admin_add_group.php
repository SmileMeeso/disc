<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $groupName = $_POST['groupName'];

        $query = "INSERT INTO `groups` (group_name) VALUES (?)";

        $stmt = $db->prepare($query);
        $stmt->execute([$groupName]);

        $query = "SELECT pk FROM `groups` ORDER BY pk DESC LIMIT 1";

        $stmt = $db->prepare($query);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['pk'];

        return $result;
    }

    echo json_encode(main());
?>
