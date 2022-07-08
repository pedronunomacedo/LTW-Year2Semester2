<?php
    function getAllNews($db, $querie) {
        $allNews = array();
        $allNews = $db->prepare($querie);
        $allNews->execute();

        return $allNews;
    }
?>