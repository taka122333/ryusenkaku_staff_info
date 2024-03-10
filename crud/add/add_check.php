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
    <title>投稿内容確認</title>
</head>
<body>
    <h1>投稿内容確認</h1>
    <?php
    try {
        $date = date('Y/m/d', strtotime($_POST['date']));
        $title = $_POST['title'];
        $body = $_POST['body'];

        echo '<h2>投稿日</h2>';
        echo $date . '<br>';
        echo '<br>';
        echo '<h2>タイトル</h2>';
        echo $title . '<br>';
        echo '<h2>本文</h2>';
        echo $body . '<br>';

    } catch (PDOException $e) {
        echo 'エラー発生' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
        exit;
    }
    ?>
    <br>
    以上の内容で投稿しますか？
    <form method="post" action="add_done.php">
        <input type="hidden" name="date" value="<?= $date ?>">
        <input type="hidden" name="title" value="<?= $title ?>">
        <input type="hidden" name="body" value="<?= $body ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="投稿する">
    </form>


    
</body>
</html>