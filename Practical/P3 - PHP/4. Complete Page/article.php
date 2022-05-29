<?php
    require_once('database/connection.php');

    $id = $_GET['id'];

    if (empty($id)) {
        echo '<p>Article id is empty</p>';
    }

    $db = getDatabaseConnection();

    // Get the information about the article corresponded to the ID given
    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $article = $stmt->fetch();

    // Get the comments of the same article
    $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
    $stmt->bindParam(':news_id', $id);
    $stmt->execute();
    $comments = $stmt->fetchAll();
?>