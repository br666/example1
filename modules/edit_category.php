<?php
/**
 * Edit category
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Edit_Category
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=edit_category
*/
if (isset($_GET['id'])) {
    $result = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    $category = $result->fetch();
    if (isset($_POST['category_name'])) {
        $result = $pdo->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $result->bindParam(':id', $_GET['id']);
        $result->bindParam(':name', $_POST['category_name']);
        $result->execute();
        header('location: index.php?v=categories');
    }
}
?>
<form method="post">
    <div class="form-group">
        <input placeholder="Nazwa kategorii" value="<?php echo $category['name']?>" name="category_name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Zapisz</button>
    </div>
</form>