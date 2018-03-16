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
if (!isset($_POST['file'])) {
    $_POST['file'] = [];
}

if(isset($_GET['id'])) {
	$files = $pdo->query('SELECT * FROM files')->fetchAll();
	$result = $pdo->prepare('SELECT * FROM article_file WHERE article_id = :article_id');
	$result->bindParam(':article_id', $_GET['id']);
	$result->execute();
	$selectedFiles = $result->fetchAll();
	$flatSelectedFiles = [];
	foreach ($selectedFiles as $selectedFile) {
		$flatSelectedFiles[] = $selectedFile['file_id'];
    }
	$result = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
	$result->bindParam(':id', $_GET['id']);
	$result->execute();
	$article = $result->fetch();
	if(isset($_POST['title'])) {
		$toDelete = array_diff($flatSelectedFiles, $_POST['file']);
		foreach ($toDelete as $delete) {
		    $result = $pdo->prepare('DELETE FROM article_file WHERE article_id = :article_id AND file_id = :file_id');
		    $result->bindParam(':article_id', $_GET['id']);
		    $result->bindParam(':file_id', $delete);
		    $result->execute();
        }
		$toAdd = array_diff($_POST['file'], $flatSelectedFiles);
		foreach ($toAdd as $add) {
			$result = $pdo->prepare('INSERT INTO article_file (article_id, file_id) VALUES(:article_id, :file_id)');
			$result->bindParam(':article_id', $_GET['id']);
			$result->bindParam(':file_id', $add);
			$result->execute();
		}
		$result = $pdo->prepare('UPDATE articles SET title = :title, author = :author, body = :body, category_id = :category_id WHERE id = :id');
		$result->bindParam(':id', $_GET['id']);
		$result->bindParam(':title', $_POST['title']);
		$result->bindParam(':author', $_POST['author']);
		$result->bindParam(':body', $_POST['body']);
		$result->bindParam(':category_id', $_POST['category_id']);
		$result->execute();
		header('location: index.php?v=articles');
	}
}
$result = $pdo->query('SELECT * FROM categories ORDER BY id DESC');
$categories = $result->fetchAll();
?>
<form method="post">
    <div class="form-group">
        <input placeholder="Nazwa artykułu" value="<?php echo $article['title'] ?>" name="title" type="text" class="form-control">
    </div>
    <div class="form-group">
        <input placeholder="Nazwa autor" value="<?php echo $article['author'] ?>" name="author" type="text" class="form-control">
    </div>
    <div class="form-group">
        <textarea name="body" class="form-control" cols="30" rows="10"><?php echo $article['body'] ?></textarea>
    </div>
    <div class="form-group">
        <select name="category_id" class="form-control">
			<?php
			foreach ($categories as $category) {
				if($category['id'] == $article['category_id']) {
				    $selected = 'selected';
                } else {
					$selected = '';
                }
				?>
                <option <?php echo $selected; ?> value="<?php echo $category['id'];?>"><?php echo $category['name'];?></option>
				<?php
			}
			?>
        </select>
    </div>
    <div class="form-group">
		<?php
		foreach ($files as $file) {
            $checked = '';
            if(in_array($file['id'], $flatSelectedFiles)) {
	            $checked = 'checked';
            }
			echo '<label>';
			echo '<img style="width: 120px;" src="images/'.$file['file_name'].'">';
			echo '<input '.$checked.' type="checkbox" name="file[]" value="'.$file['id'].'">';
			echo '</label>';
		}
		?>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Zapisz</button>
    </div>
</form>