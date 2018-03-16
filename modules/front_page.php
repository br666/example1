<?php
if (isset($_GET['id'])) {
	$result = $pdo->prepare('SELECT * FROM articles WHERE category_id = :category_id');
    $result->bindParam(':category_id', $_GET['id']);
    $result->execute();
    $articles = $result->fetchAll();
    foreach ($articles as $article) {
        echo '<div class="frame">';
        echo '<div class="title">Tytuł: <a href="index.php?v=show_article&id='. $article['category_id'] .'&art_id='. $article['id'] .'">'. $article['title'] . '</a></div>';
        echo '<div class="autor">Autor: '. $article['author']. '</div>';
        echo '<div class="content"> Skrocony wpis: '. substr($article['body'], 0, 100) .'</div>';
        echo '<div style="text-align:right" class="content"> <a href="index.php?v=show_article&id='. $article['category_id'] .'&art_id='. $article['id'] .'">CZYTAJ WIĘCEJ MENDO</a></div>';
        echo '</div>';
        echo '<br/>';
    }
} else {
    $articles = $pdo->query('SELECT * FROM articles')->fetchAll();
    foreach ($articles as $article) {
        echo '<div class="frame">';
        echo '<div class="title">Tytuł: <a href="index.php?v=show_article&id='. $article['category_id'] .'&art_id='. $article['id'] .'">'. $article['title'] . '</a></div>';
        echo '<div class="autor">Autor: '. $article['author'].'</div>';
        echo '<div class="content">Skrócony wpis: '. substr($article['body'], 0, 100).'</div>';
        echo '<div style="text-align:right" class="content"> <a href="index.php?v=show_article&id='. $article['category_id'] .'&art_id='. $article['id'] .'">CZYTAJ WIĘCEJ MENDO</a></div>';
        echo '</div>';
        echo '<br/>';
    }
}
//dump($articles);
?>