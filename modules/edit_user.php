<?php
/**
 * Edit User
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Edit_User
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=edit_user
*/
if (isset($_GET['id'])) {
        $result=$pdo->prepare('SELECT * FROM `users` WHERE login=:login');
        $result->bindParam(':login', $_POST['user_login_new']);
        $result->execute();
        $user=$result->fetch();
    if ($user) {
        echo'<h1 class="alert alert-danger">Użytkownik o podanym loginie juz istnieje</h1>';
    } else {
        $result = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $result->bindParam(':id', $_GET['id']);
        $result->execute();
        $users = $result->fetch();
        if (isset($_POST['user_login'])) {
            if ($_POST['user_password_new'] === $_POST['user_password_new_repeat']) {
                $result = $pdo->prepare('UPDATE users SET login = :login, password = :password WHERE id = :id');
                $result->bindParam(':id', $_GET['id']);
                $result->bindParam(':login', $_POST['user_login_new']);
                $result->bindParam(':password', $_POST['user_password_new']);
                $result->execute();
                header('location: index.php?v=users');
            } else {
                echo '<div class="alert alert-danger">Wpisane hasło nie jest takie same</div>';
            }
        }
    }
}
?>
<?php echo '<h1>Zmień swoje hasło i login</h1>'?>
<form method="post">
    <div class="form-group">
        <input placeholder="<?php echo $users['login'] ?>" name="user_login" type="text" class="form-control" readonly>
    </div>
    <div class="form-group">
        <input placeholder="Nowy login użytkownika" name="user_login_new" type="text" class="form-control">
    </div>
    <div class="form-group">
        <input placeholder="<?php echo $users['password'] ?>" name="user_password" type="password" class="form-control" readonly>
    </div>
    <div class="form-group">
        <input placeholder="Nowe hasło użytkownika" name="user_password_new" type="password" class="form-control">
    </div>
    <div class="form-group">
        <input placeholder="Powtórz nowe hasło użytkownika" name="user_password_new_repeat" type="password" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-success">Zapisz</button>
    </div>
</form>