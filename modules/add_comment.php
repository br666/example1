<?php
/**
 * Add Comment
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Add_Comment
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=add_article
*/
$users = $pdo->query('SELECT * FROM users');
$articles = $pdo->query('SELECT * FROM articles');
if (isset($_POST['comment'])) {
    $result = $pdo->prepare('INSERT INTO `comments` (`id`, `content`, `user_id`, `article_id`, `created_at`) VALUES (NULL, :comment, :login, :title, CURRENT_TIMESTAMP);');
    $result->bindParam(':comment', $_POST['comment']);
    $result->bindParam(':login', $_POST['user_login']);
    $result->bindParam(':title', $_POST['article_title']);
    $result->execute();
    header('location: index.php?v=comments');
}

?>

<h1>Dodaj komentarz</h1>
<form method="post">
   <div class="form-group">
       <label for="article_title"><h4>Tytuł artykułu:</h4></label>
       <select id="article_title" class="form-control" name="article_title">
            <?php foreach ($articles as $article): ?>
               <option value="<?php echo $article['id']; ?>"><?php echo $article['title']; ?></option>
            <?php endforeach ?>
       </select>
   </div>
   <div class="form-group">
       <label for="user_login"><h4>Użytkownik:</h4></label>
       <select id="user_login" class="form-control" name="user_login">
            <?php foreach ($users as $user): ?>
               <option value="<?php echo $user['id']; ?>"><?php echo $user['login']; ?></option>
            <?php endforeach ?>
       </select>
   </div>
   <div class="form-group">
       <textarea class="form-control" name="comment" placeholder="Treść komentarza"></textarea>
   </div>
   <br>
   <div class="form-group">
       <button class="btn btn-success">Zapisz</button>
   </div>
</form>