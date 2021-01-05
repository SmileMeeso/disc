<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $searchQuery = $_POST['query'];
        $searchType = $_POST['type'];

        if ($searchQuery != '') {
            $query = "SELECT id, name, group_name, disc, disc_name FROM user_info WHERE $searchType LIKE ?";

            $stmt = $db->prepare($query);
            $stmt->execute(["$searchQuery%"]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        else {
            $query = "SELECT id, name, group_name, disc, disc_name FROM user_info";

            $stmt = $db->prepare($query);
            $stmt->execute([]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        return $result;
    }

    echo json_encode(main());
?>
