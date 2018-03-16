<?php
/**
 * Index
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Index
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/
*/
session_start();
require 'db/pdo.php';
require 'utils/utils.php';
require 'routes.php';
if (isset($_GET['v'])) {
    $module = $_GET['v'];
} else {
    $module =('front_page');
}
if (isset($routes[$module])) {
    $route = $routes[$module];
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404';
    die;
}
$logged = false;
if ((!isset($_SESSION['login']) || $_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']) && $route['is_admin']) {
    $module = 'login';
} else {
    $logged = true;
    // echo 'Zalogowany użytkownik to: ';
    // echo $_SESSION['login'];
}
    $moduleFile = 'modules/' . $module . '.php';
    ob_start();
if (file_exists($moduleFile)) {
    include $moduleFile;
} else {
    echo '404';
    header("HTTP/1.0 404 Not Found");
}
$content = ob_get_contents();
ob_end_clean();
if ($route['is_admin']) {
    include 'layouts/admin.php';
} else {
    include 'layouts/front.php';
}
