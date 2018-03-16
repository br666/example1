<?php
/**
 * Utils
 *
 *PHP Version 7.2.2
 *
 * @category CL_PHP_001
 * @package  Utils
 * @author   Display Name <br666@o2.pl>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://local.test.pl/cl_php_001/index.php?v=articles
*/
function dump($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
function paginator($page, $allPages, $module){
   $page = $page + 1;
   $start = $page - 2;
   if ($start < 1) {
       $start = 1;
   }
   $end = $start + 4;
   if($allPages > 4){
       $end = $start + 4;
       if($end > $allPages){
           $diff = $end - $allPages;
           $start = $start - $diff;
           $end = $allPages;
       }
   }
   else{
       $end = $allPages;
   }
   echo '<ul class="pagination">';
   for ($i = $start; $i <= $end; $i++) {
       $active = ($i == $page) ? 'active' : '';
       echo '<li class="page-item ' . $active . '">';
       echo '<a class="page-link" href="index.php?v=' . $module . '&page=' . $i . '">' . $i . '</a>';
       echo '</li>';
   }
   echo '</ul>';
}