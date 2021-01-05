<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $searchQuery = $_POST['query'];

        if ($searchQuery != '') {
            $query = "SELECT id, name, group_name, uid FROM user_info WHERE name LIKE ?";

            $stmt = $db->prepare($query);
            $stmt->execute(["%$searchQuery%"]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $query = "SELECT id, name, group_name, uid FROM user_info";

            $stmt = $db->prepare($query);
            $stmt->execute([]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        return $result;
    }

    echo json_encode(main());
?>
