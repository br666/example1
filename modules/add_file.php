<?php
/**
 * Add File
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Add_File
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=add_file
*/
if (isset($_FILES['file_name']) && $_FILES['file_name']['error'] === 0) {
    //$fileName = $_FILES['file_name']['name'];
    //$fileName = uniqid();

    $fileName = md5(file_get_contents($_FILES['file_name']['tmp_name']));

    $ext = pathinfo($_FILES['file_name']['name'], PATHINFO_EXTENSION);
    $fileName = $fileName . '.' . $ext;
    //$data = explode('.', $_FILES['file_name']['name']);
    //$count = count($data);
    //dump($data[$count-1]);
    move_uploaded_file($_FILES['file_name']['tmp_name'], 'images/' . $fileName);

    $result = $pdo->prepare('INSERT INTO files (file_name) VALUES(:file_name)');
    $result->bindParam(':file_name', $fileName);
    $result->execute();
    header('location: index.php?v=files');
}?>
<form enctype="multipart/form-data" method="post">
<h2>Wybierz plik który chcesz dodać na serwer</h2>
	<div class="form-group">
		<input placeholder="Plik" name="file_name" type="file" class="form-control">
	</div>
	<div class="form-group">
		<button class="btn btn-success">Zapisz</button>
	</div>
</form>