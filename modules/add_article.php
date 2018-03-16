<?php
/**
 * Add article
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Add_Article
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=add_article
*/

$files = $pdo->query('SELECT * FROM files')->fetchAll();

if (isset($_POST['title'])) {

    $result = $pdo->prepare('INSERT INTO `articles` (`title`, `author`, `body`, `category_id`) VALUES (:title, :author, :body, :category_id)');
    $result->bindParam(':title', $_POST['title']);
    $result->bindParam(':author', $_POST['author']);
    $result->bindParam(':body', $_POST['body']);
    $result->bindParam(':category_id', $_POST['category_id']);
    $result->execute();
    $articleId = $pdo->lastInsertId();

    foreach ($_POST['file'] as $file) {
        $result = $pdo->prepare('INSERT INTO article_file (article_id, file_id) VALUES(:article_id, :file_id)');
        $result->bindParam(':article_id', $articleId);
        $result->bindParam(':file_id', $file);
        $result->execute();
    }
    header('location: index.php?v=articles');
}

$result = $pdo->query('SELECT * FROM categories ORDER BY id DESC');
$categories = $result->fetchAll();
?>

<form method="post">
	<div class="form-group">
		<input placeholder="Tytuł" name="title" type="text" class="form-control">
	</div>

	<div class="form-group">
		<input placeholder="Autor" name="author" type="text" class="form-control">
	</div>

	<div class="form-group">
		<textarea name="body" placeholder="Podaj treść artykułu" class="form-control" cols="30" rows="10"></textarea>
	</div>

    <div class="form-group">
        <select name="category_id" class="form-control">
        <?php
        foreach ($categories as $category) {
        ?>
            <option value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
        <?php
        }
        ?>
        </select>
    </div>

    <div class="form-group">
        <?php
        foreach ($files as $file) {
            echo '<label>';
                echo '<img style="width: 120px;" src="images/'.$file['file_name'].'">';
                echo '<input type="checkbox" name="file[]" value="'.$file['id'].'">';
            echo '</label>';
        }
        ?>
    </div>

	<div class="form-group">
		<button class="btn btn-success">Zapisz</button>
	</div>
</form>