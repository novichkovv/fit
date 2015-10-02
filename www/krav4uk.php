<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 02.10.2015
 * Time: 12:32
 */
session_start();
if(isset($_POST['submit_btn'])) {
    if($_POST['login'] == 'krav4uk' && md5($_POST['password']) == 'c6681bf5088cf62418f95f12d0022d69') {
        $_SESSION['krav4uk'] = true;
    }
}
if($_SESSION['krav4uk']): ?>
<!DOCTYPE html>
<html>
<head></head>
<body>
sdfs
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
        <input type="text" name="password"><br><br>
        <input type="submit" name="submit_btn"><br><br>
    </form>
</body>
</html>
<?php endif; ?>
