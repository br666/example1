<a href="index.php?v=add_file" class="btn btn-primary">Dodaj plik</a>
<br/><br/>
<?php
/**
 * Files main site
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Files
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=articles
*/
$files = $pdo
    ->query('SELECT * FROM files')
    ->fetchAll();

echo '<table class="table table-hover">';
    echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Name</th>';
        echo '<th>Edit</th>';
        echo '<th>Delete</th>';
    echo '</tr>';
foreach ($files as $file) {
    echo '<tr>';
        echo '<td>';
            echo $file['id'];
        echo '</td>';
        echo '<td>';
            echo '<img width="180" src="images/'.$file['file_name'].'">';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-success" href="index.php?v=edit_file&id='.$file['id'].'">Edit</a>';
        echo '</td>';
        echo '<td>';
            echo '<a class="btn btn-danger" href="index.php?v=delete_file&id='.$file['id'].'">Delete</a>';
        echo '</td>';
    echo '</tr>';
}
echo '</table>';

?>