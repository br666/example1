<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMD</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
</head>

<body>
    <div class="main-container">
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
    if (isset($_SESSION['id'])) {
        echo '<a class="nav-link" href="index.php?v=logout">Wyloguj: <b>('.$_SESSION['login'].' )</b></a>';
    } else {
        echo '<a class="nav-link" href="index.php?v=login">Logowanie</a>';
    }
    ?>
        <div class="header"><h1>Super strona</h1></div>
        <div class="container">
            <div class="content">
            <?php echo $content; ?>
            </div>
            <div class="sidebar">
                <ul class="menu">
                <?php
                $sql = 'SELECT * FROM categories ORDER BY name ASC';
                $categories = $pdo->query($sql)->fetchAll();
                $bold = 'normal';
                foreach ($categories as $category) {
                    if (isset($_GET['id'])) {
                        $bold = 'normal';
                        if ($category['id'] == $_GET['id']) {
                            $bold = 'bold';
                        }
                    }
                ?>
                    <li class="<?php echo $bold;?>">
                        <a   href="index.php?v=front_page&id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>