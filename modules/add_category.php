<?php
/**
 * Add category
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Add_Category
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=add_category
*/
if (isset($_POST['category_name'])) {
    $result = $pdo->prepare('INSERT INTO `categories`(`name`) VALUES (:name)');
    $result -> bindParam(':name', $_POST['category_name']);
    $result -> execute();
    header('location: index.php?v=categories');
}
?>
<form method="post">
    <div class="form-group">
        <input placeholder="Nazwa kategorii" name="category_name" type="text" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Zapisz</button>
    </div>
</form>