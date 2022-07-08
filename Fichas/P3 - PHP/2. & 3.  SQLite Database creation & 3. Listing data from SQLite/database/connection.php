<?php
    require_once('database/connection.php');

    function getDatabaseConnection() {
        $db = new PDO('sqlite:news.db');

        return $db;
    }

    $db = getDatabaseConnection();
?>