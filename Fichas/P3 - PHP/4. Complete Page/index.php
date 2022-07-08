<?php
    include('database/connection.php');
    //include('article.php');

    $db = getDatabaseConnection(); // connection to the database

    $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                        FROM news JOIN
                            users USING (username) LEFT JOIN
                            comments ON comments.news_id = news.id
                        GROUP BY news.id, users.username
                        ORDER BY published DESC'
                        );
    
    $stmt->execute();
    $articles = $stmt->fetchAll();


    ?> 
    <section id="news"> <?php
        foreach ($articles as $article) {
            $date = date('F j', $article['published']);
            $tags = explode(',', $article['tags']);
            ?>
            <article>
                <header>
                    <h1><a href= "http://localhost:9000/article.php?id=<?=$article['id']?>"><?=$article['title']?></a></h1>
                </header>
                <img src = "https://picsum.photos/600/300?id=<?=$article['id']?>" alt = "">
                <p><?=$article['introduction']?></p>
                <footer>
                    <span class = "author"><?=$article['name']?></span>
                    <span class = "tags">
                        <?php foreach($tags as $tag) { ?>
                            <a href = "index.php">#<?=$tag?></a>
                        <?php } ?>
                    </span>
                    <span class = "date"><?=$date?></span>
                    <a class = "comments" href = "article.php?id=<?=article['id']?>#comments"><?=$article['comments']?></a>
                </footer>
            </article>
        <?php } ?>
    </section> <?php
?>