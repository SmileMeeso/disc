<?php
session_start();

function connectMysql () {
    $user = $_SERVER['MYSQL_USER'];
    $password = $_SERVER["MYSQL_PASSWORD"];
    $db = $_SERVER["MYSQL_DB_NAME"];
    $host = $_SERVER["MYSQL_HOST"];

    $info = "mysql:host=$host;dbname=$db;";

    try {
        $db = new PDO($info, $user, $password);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $db;
}
function checkSession () {
    $db = connectMysql ();

    $query = "SELECT uid FROM session WHERE token = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$_SESSION['token']]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        return $result[0]['uid'];
    }
    else {
        return false;
    }
}
function checkAdminSession () {
    $db = connectMysql ();

    $query = "SELECT uid FROM admin_session WHERE token = ?";

    $stmt = $db->prepare($query);
    $stmt->execute([$_SESSION['admin_token']]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        return $result[0]['uid'];
    }
    else {
        return false;
    }
}
