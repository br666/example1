<?php
/**
 * Connection to mysql server
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  PDO
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/
*/
$pdo =new PDO('mysql:host=localhost;dbname=cms;encoding=utf8', 'root', 'root');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);