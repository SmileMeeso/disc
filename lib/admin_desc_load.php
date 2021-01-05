<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $disc = $_POST['disc_type'];

        $query = "SELECT disc_desc FROM disc_description WHERE disc = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$disc]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];

        return $result;
    }

    echo json_encode(main());
?>
