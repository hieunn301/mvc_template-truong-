<?php
session_start();
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Quản lý thành viên</title>
        <link rel="stylesheet" href="public/css/grid.css">
        <link rel="stylesheet" href="public/css/main.css">
        <link rel="stylesheet" href="public/css/base.css">
        <link rel="stylesheet" href="public/css/responsive.css">
        <link rel="stylesheet" href="public/img/base.css">

    </head>
    <body>
    <?php
    //if (isset($_SESSION['u_id'])) {
    //    include_once 'View/login/navbar.php';
    //}
    ?>
    </body>
    </html>
<?php
include_once 'App/constans.php';
include_once 'App/helper.php';
include_once 'App/register.php';
include_once 'App/boostrap.php';

$fullUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$host = explode('?', $fullUrl);

$db = new Database();
$conn = $db->connect();
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home';
}
switch ($controller) {
    case 'home':
    {
        require_once 'Controller/home/index.php';
    }
    case 'authen':
    {
        require_once 'Controller/authen/auth.php';
    }
    case 'admin':
    {
        require_once 'Controller/product/product.php';
    }
    case 'product':
    {
        require_once 'Controller/product/product.php';
    }
}
