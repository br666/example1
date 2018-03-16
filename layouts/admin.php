<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CMD</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style_log.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    </head>
    <body>
        <div class="container">
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
        if ($logged) { ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Nawigacja</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/cl_php_001/index.php">Strona główna
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=categories">Kategorie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=articles">Artykuły</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=files">Pliki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=comments">Komentarze</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=users">Użytkownicy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=login">Logowanie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?v=logout">Wyloguj: <b>(<?php echo $_SESSION['login']; ?>)</b></a>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>
            <hr>
            <?php
            /**
            * Files admin
            *
            *PHP Version 7.2.2
            *
            * @category CL_PHP_001
            * @package  Admin
            * @author   Display Name <br666@o2.pl>
            * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
            * @link     http://local.test.pl/cl_php_001/index.php
            */
            echo $content; ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>
        <script src='js/svg.js'></script>
        <script src="js/index.js"></script>
    </body>
</html>