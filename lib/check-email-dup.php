<?php
    require '../vendor/autoload.php';
    require 'util.php';

    function main () {
        $db = connectMysql ();

        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $name = $_POST['name'];

        $query = "SELECT id AS one FROM user_info WHERE id = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    echo json_encode(main());
?>
