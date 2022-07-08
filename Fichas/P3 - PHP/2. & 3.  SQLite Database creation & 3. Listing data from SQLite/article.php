<?php
    require_once('database/connection.php');

    /* Opening a connection to the database */
    //$db = new PDO('sqlite:news.db');
    $db = getDatabaseConnection();

    // Code to get the article information
    $stmt = $db->prepare('SELECT * FROM news
                        JOIN users USING (username)
                        WHERE id = :id');
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $article = $stmt->fetch();

    // Code to get the article comments
    $stmt = $db->prepare('SELECT * FROM comments 
                        JOIN users USING (username)
                        WHERE news_id = ?');
    $stmt->execute(array($_GET['id']));
    $commments = $stmt->fetchAll();

    /* Print the article id */
    // echo '<p>' . $_GET['id'] . '</p>';


?>