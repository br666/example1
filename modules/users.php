<a class="btn btn-primary" href="index.php?v=add_user">Dodaj użytkownika</a>
<br/><br/>
<?php
/**
 * Users main site
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Users
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=users
*/
$result = $pdo->query('SELECT * FROM users ORDER BY id DESC');
$users = $result->fetchAll();
echo '<table class="table table-hover">';
echo '<tr>';
    echo '<th>Id</th>';
    echo '<th>Login</th>';
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
echo '</tr>';
foreach ($users as $user) {
    echo '<tr>';
        echo '<td>';
            echo $user['id'];
        echo '</td>';
        echo '<td>';
            echo $user['login'];
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-success" href="index.php?v=edit_user&id='.$user['id'].'">Edytuj konto</a>';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-danger" href="index.php?v=delete_user&id='.$user['id'].'">Usuń konto</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>'
?>
