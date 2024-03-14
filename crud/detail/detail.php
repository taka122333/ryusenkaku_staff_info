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
    <title>お知らせ詳細</title>
</head>
<body>
    <h1>お知らせ詳細</h1>
    <?php
    try {
        require_once('../../common/security.php');
        require_once('../../common/db_config.php');
        
        $id = $_GET['id'];

        $sql = 'SELECT * FROM comment_keep WHERE id = ?';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;

        echo '<h2>投稿日</h2>';
        echo date('Y/m/d', strtotime($result['date'])) . '<br>';
        echo '<br>';
        echo '<h2>タイトル</h2>';
        echo $result['title'] . '<br>';
        echo '<h2>本文</h2>';
        echo nl2br($result['body']) . '<br>';

    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
        exit;
    }
    ?>
    <br>
    <form method="post" action="../edit/edit.php?id=<?= $result['id'] ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="変更する">
    </form>
</body>
</html>