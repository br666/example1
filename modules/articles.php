<a class="btn btn-primary" href="index.php?v=add_article">Dodaj artykuł</a>
<br/><br/></hr>
<?php
/**
 * Articles main site
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Articles
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=articles
*/
$result = $pdo->query('SELECT * FROM articles ORDER BY id DESC');
$articles = $result->fetchAll();
// $result = $pdo->query('SELECT * FROM categories ORDER BY id DESC');
// $categories = $result->fetchAll();
// foreach($categories as $category){
//     echo $category['id'];
//     echo $category['name'];
// }
$sql = 'SELECT articles.*, categories.name AS cat_id FROM articles LEFT JOIN categories ON articles.category_id = categories.id';
$result = $pdo->query($sql);
$articles = $result->fetchAll();

$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$page = $page -1;
if ($page < 0) {
    $page = 0;
}
$limit = 10;
$from = $page * $limit;
$count = $pdo->query('SELECT COUNT(id) as cnt FROM articles')->fetch()['cnt'];
$allPages = ceil($count / $limit);
if ($page > $allPages-1) {
    header('location: index.php?v=articles&page='. $allPages);
}
$sql = 'SELECT * FROM articles ORDER BY id ASC LIMIT ' . $from . ', '. $limit;
$result = $pdo->query($sql);
$categories = $result->fetchAll();


echo '<table class="table table-hover">';
echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Title</th>';
    echo '<th>Author</th>';
    echo '<th>Nazwa Kategorii</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
echo '</tr>';
foreach ($articles as $article) {
    echo '<tr>';
        echo '<td>';
            echo $article['id'];
        echo '</td>';
        echo '<td>';
            echo $article['title'];
        echo '</td>';
        echo '<td>';
            echo $article['author'];
        echo '</td>';
        echo '<td>';
            echo $article['cat_id'];
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-success" href="index.php?v=edit_article&id='.$article['id'].'">Edit</a>';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-danger" href="index.php?v=delete_article&id='.$article['id'].'">Delete</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>';
paginator($page, $allPages, 'articles');
?>