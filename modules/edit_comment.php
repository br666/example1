<?php
/**
 * Edit article
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Edit_Article
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=edit_article
*/
if (isset($_GET['id'])) {
    $result = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    $comment = $result->fetch();
}

if (isset($_POST['comment'])) {
    $result = $pdo->prepare('UPDATE `comments` SET `content` = :comment WHERE `comments`.`id` = :id');
    $result->bindParam(':comment', $_POST['comment']);
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    header('location: index.php?v=comments');
}

?>

<form method="post">
  <div class="form-group">
       <textarea class="form-control" name="comment" placeholder="Treść komentarza"><?php echo $comment['content']; ?></textarea>
   </div>
   <br>
  <div class="form-group">
      <button class="btn btn-success">Zapisz</button>
  </div>
</form>