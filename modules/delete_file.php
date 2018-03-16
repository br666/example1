<?php
/**
 * Delete File
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Delete_File
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=delete_file
*/
if (isset($_GET['id'])) {
    $result = $pdo->prepare('SELECT * FROM files WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    $file = $result->fetch();
    $result = $pdo->prepare('SELECT * FROM files WHERE file_name = :file_name AND id != :id');
    $result->bindParam(':file_name', $file['file_name']);
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    $other = $result->fetch();
    if (!$other) {
        unlink('images/' . $file['file_name']);
    }
    $result = $pdo->prepare('DELETE FROM files WHERE id = :id');
    $result->bindParam(':id', $_GET['id']);
    $result->execute();
    header('location:index.php?v=files');
}