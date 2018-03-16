<?php
/**
 * Show articles
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Articles
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=articles
*/
if (isset($_GET['art_id'])) {
    $result = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
    $result->bindParam('id', $_GET['art_id']);
    $result->execute();
    $articles = $result->fetch();
    echo '<div class="frame">';
    echo '<div class="title">Tytuł:'. $articles['title'] . '</div>';
    echo '<div class="autor">Autor: '. $articles['author'].'</div>';
    echo '<div class="content">Cały wpis: '. $articles['body'].'</div>';
    echo '</div>';
    echo '<br/>';

    $result = $pdo->prepare('SELECT * FROM article_file WHERE article_id = :id');
    $result->bindParam(':id', $_GET['art_id']);
    $result->execute();
    $files = $result->fetchAll();

    foreach ($files as $file) {
        $result = $pdo->prepare('SELECT * FROM files WHERE id = :id');
        $result->bindParam(':id', $file['file_id']);
        $result->execute();
        $img = $result->fetch();
        echo '<img src="images/' . $img['file_name'] . '">';
    }

    $result = $pdo->prepare('SELECT comments.content, comments.created_at, users.login FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE article_id = :id');
    $result->bindParam(':id', $_GET['art_id']);
    $result->execute();
    $comments = $result->fetchAll();

    foreach ($comments as $comment) {
        echo '<div style="margin:50px">';
        echo '<div class="tip left">';
        echo '<div class="user">Użytkownik: <div class="name">'. $comment['login'] . '</div></div>';
        echo '<div class="time">Dodane: '. $comment['created_at'] . '</div>';
        echo '<div class="comment"><div class="comm">Treść iście zacnego komentarza:</div><br/>'. $comment['content'] . '</div>';
        echo '</div></div>';
    }
}
?>
<br/><br/><br/><br/><br/><br/>
<div>Dodaj komentarz</div>
<form method="post">

   <div class="form-gruop">
       <textarea class="form-control" name="comment" placeholder="Treść komentarza"></textarea>
   </div>
   <div class="form-group">
       <button class="btn btn-success">Zapisz</button>
   </div>
</form>

<?php

if (isset($_POST['comment'])) {

    if (isset($_SESSION['id'])) {
        $user = $_SESSION['id'];
    } else {
            $user = '1';
            }
    $result = $pdo->prepare('INSERT INTO `comments` (`content`, `user_id`, `article_id`, `created_at`) VALUES (:comment, :user_id, :article_id, CURRENT_TIMESTAMP)');
    $result->bindParam(':comment', $_POST['comment']);
    $result->bindParam(':user_id', $user);
    $result->bindParam(':article_id', $_GET['art_id']);
    $result->execute();
    header("Refresh:0");
}