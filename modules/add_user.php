<?php
/**
 * Add User
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Add_User
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=add_user
*/
if (isset($_POST['user_login'])) {
    $result=$pdo->prepare('SELECT * FROM `users` WHERE login=:login');
    $result->bindParam(':login', $_POST['user_login']);
    $result->execute();
    $user=$result->fetch();
    if ($user) {
        echo'<h1>Użytkownik o podanym loginie juz istnieje</h1>';
    } else {
        if ($_POST['user_password'] === $_POST['user_password_repeat']) {
            $result = $pdo->prepare('INSERT INTO `users`(`login`, `password`) VALUES (:login, :password )');
            $result->bindParam(':login', $_POST['user_login']);
            $result->bindParam(':password', $_POST['user_password']);
            $result->execute();
            header('location: index.php?v=users');
        } else {
            echo '<div class="alert alert-danger">Wpisane hasło nie jest takie same</div>';
        }
    }
}
?>
<form method="post">
    <div class="form-group">
        <input placeholder="Login użytkownika" name="user_login" type="text" class="form-control">
    </div>
    <div class="form-group">
        <input placeholder="Hasło użytkownika" name="user_password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <input placeholder="Powtórz hasło użytkownika" name="user_password_repeat" type="password" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Zapisz</button>
    </div>
</form>