<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 02.10.2015
 * Time: 12:32
 */
session_start();
header('Content-Type: text/html; charset=utf8');
error_reporting(0);
if(isset($_POST['submit_btn'])) {
    if($_POST['login'] == 'krav4uk' && md5($_POST['password']) == 'c6681bf5088cf62418f95f12d0022d69') {
        $_SESSION['krav4uk'] = true;
    }
}
if(isset($_POST['exit'])) {
    unset($_SESSION['krav4uk']);
    session_destroy();
    header('Location: ?');
    exit;
}
if($_SESSION['krav4uk']): ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>


<form method="post" action="">
    <input type="submit" name="exit" value="Выйти"><br><br>
</form>
</body>
</html>
<?php endif; ?>
<?php if(!$_SESSION['krav4uk']): ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
    <form action="" method="post">
        <input type="text" name="login"><br><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="submit_btn"><br><br>
    </form>

</body>
</html>
<?php endif; ?>
