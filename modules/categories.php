<a class="btn btn-primary" href="index.php?v=add_category">Dodaj Kategorie</a>
<br/><br/></hr>
<?php
/**
 * Categories main site
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Categories
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=categories
*/
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$page = $page -1;
if ($page < 0) {
    $page = 0;
}
$limit = 10;
$from = $page * $limit;
$count = $pdo->query('SELECT COUNT(id) as cnt FROM categories')->fetch()['cnt'];
$allPages = ceil($count / $limit);
if ($page > $allPages-1) {
    header('location: index.php?v=categories&page='.$allPages);
}
$sql = 'SELECT * FROM categories ORDER BY id ASC LIMIT ' . $from . ', '. $limit;
$result = $pdo->query($sql);
$categories = $result->fetchAll();
 echo '<table class="table table-hover">';
 echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Name</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
 echo '</tr>';
foreach ($categories as $category) {
    echo '<tr>';
        echo '<td>';
            echo $category['id'];
        echo '</td>';
        echo '<td>';
            echo $category['name'];
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-success" href="index.php?v=edit_category&id='.$category['id'].'">Edit</a>';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-danger" href="index.php?v=delete_category&id='.$category['id'].'">Delete</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>';
paginator($page, $allPages, 'categories');

?>