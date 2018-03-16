<a class="btn btn-primary" href="index.php?v=add_comment">Dodaj komentarz</a>
<br/><br/></hr>
<?php
/**
 * Comments main site
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Comments
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=comments
*/
$result = $pdo->query('SELECT * FROM comments ORDER BY id DESC');
$comments = $result->fetchAll();
$sql = 'SELECT comments.*, users.login AS user_login,articles.title AS articles_title FROM comments LEFT JOIN users ON comments.user_id = users.id LEFT JOIN articles ON comments.article_id = articles.id';
$result = $pdo->query($sql);
$comments = $result->fetchAll();
////$sql = 'SELECT comments.*, articles.title AS articles_titles FROM comments LEFT JOIN articles ON comments.article_id = articles.id';
//$result = $pdo->query($sql);
//$comments = $result->fetchAll();
//var_dump($result);
//var_dump($comments);
echo '<table class="table table-hover">';
echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Content</th>';
    echo '<th>User</th>';
    echo '<th>Artykuł</th>';
    echo '<th>Created_at</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
echo '</tr>';

foreach ($comments as $comment) {
    echo '<tr>';
        echo '<td>';
            echo $comment['id'];
        echo '</td>';
        echo '<td>';
            echo $comment['content'];
        echo '</td>';
        echo '<td>';
            echo $comment['user_login'];
        echo '</td>';
        echo '<td>';
            echo $comment['articles_title'];
        echo '</td>';
        echo '<td>';
            echo $comment['created_at'];
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-success" href="index.php?v=edit_comment&id='.$comment['id'].'">Edit</a>';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-danger" href="index.php?v=delete_comment&id='.$comment['id'].'">Delete</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>'
?>