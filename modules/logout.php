<?php
/**
 * Login
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Login_Module
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=login
*/

if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
    session_destroy();
}
header('location: index.php');