<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE['sassion_name()']) == true) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    ログアウトしました。<br>
    <br>
    <a href="../staff_login.html">ログイン画面へ</a>
</body>
</html>