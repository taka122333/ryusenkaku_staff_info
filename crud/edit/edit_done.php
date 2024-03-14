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
    echo '<a href="../../logout/staff_logout.php">ログアウト</a>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お知らせ変更完了</title>
</head>
<body>
    <h1>変更が完了しました。</h1>
    <?php
    try {
        require_once('../../common/security.php');
        require_once('../../common/db_config.php');
        
        $id = (int)$_GET['id'];
        $date = date('Y/m/d', strtotime($_POST['date']));
        $title = $_POST['title'];
        $body = $_POST['body'];

        $sql = 'UPDATE comment_keep SET date = ?, title = ?, body = ? WHERE id = ?';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $date, PDO::PARAM_STR);
        $stmt->bindValue(2, $title, PDO::PARAM_STR);
        $stmt->bindValue(3, $body, PDO::PARAM_STR);
        $stmt->bindValue(4, $id, PDO::PARAM_INT);
        $stmt->execute();
        $dbh = null;

        echo '<h2>投稿日</h2>';
        echo $date . '<br>';
        echo '<br>';
        echo '<h2>タイトル</h2>';
        echo $title . '<br>';
        echo '<h2>本文</h2>';
        echo nl2br($body) . '<br>';

    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
        exit;
    }
    ?>
    <br>
    <a href="../../staff_info.php">お知らせ一覧に戻る</a>
    
</body>
</html>