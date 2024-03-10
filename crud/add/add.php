<?php
session_start();
session_regenerate_id(true);
if (isset($_SESSION['staff_login']) == false) {
    echo 'ログインしてください。<br>';
    echo '<br>';
    echo '<a href="staff_login.html">ログイン画面へ</a>';
    exit;
} else {
    $login_id = $_SESSION['login_id'];
    echo '従業員ID: ' . $login_id . ' 操作中';
    echo '----------------';
    echo '<a href="./logout/staff_logout.php">ログアウト</a>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿</title>
</head>
<body>
    <h1>新規投稿</h1>

    <form method="post" action="add_check.php">
        <h2>投稿日</h2>
        <input type="date" name="date"><br>
        
        <h2>タイトル</h2>
        <input type="text" name="title"><br>
        
        <h2>本文</h2>
        <textarea name="body" id="" cols="100" rows="20"></textarea><br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="送信">

    </form>
    

    
</body>
</html>