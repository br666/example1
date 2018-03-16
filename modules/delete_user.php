<?php
/**
 * Delete User
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Delete_User
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=delete_file
*/
if (isset($_GET['id'])) {
    $result = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    header('location: index.php?v=users');
}
