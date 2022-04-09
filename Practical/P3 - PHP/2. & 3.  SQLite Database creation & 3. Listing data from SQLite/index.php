<?php
    include('article.php');
    require_once('database/connection.php');
    require_once('database/news.php');

    /* Opening a connection to the database */
    $db = new PDO('sqlite:news.db');
    //$db = getDatabaseConnection();

    /* Execute a query returning all news in the database */
    $articles = getAllNews($db, 'SELECT news.*, users.*, COUNT(comments.id) AS comments
                                FROM news JOIN
                                users USING (username) LEFT JOIN
                                comments ON comments.news_id = news.id
                                GROUP BY news.id, users.username
                                ORDER BY published DESC');

    $date = date('F j', $articles['published']); // Format date
    $tags = explode('.', $articles['tags']); // To split a string by a separator

    /* The variable $articles is an associative array containing all the news in the database */
    foreach($articles as $article) {
        // Get all the information about each article
        $date = date('F j', $article['published']);
        $tags = explode('.', $article['tags']);
        $id = $article['id'];

        echo '<a href="article.php?id=' . $id . '"><h1>' . $article['title'] . '</h1></a>';
        foreach($tags as $tag) { // Go throug every tag of the article
            echo '<p>' . $tag . '</p>';
        }
        echo '<p>' . $date . '</p>';
        echo '<p>' . $article['introduction'] . '</p>';
    }
?>