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
    <title>お知らせ変更</title>
</head>
<body>
    <h1>お知らせ変更</h1>
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

    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
        exit;
    }
    ?>

    <form method="post" action="edit_check.php?id=<?= $result['id'] ?>">
        <h2>投稿日</h2>
        <input type="date" name="date" value="<?= $result['date'] ?>"><br>
        
        <h2>タイトル</h2>
        <input type="text" name="title" value="<?= $result['title'] ?>"><br>
        
        <h2>本文</h2>
        <textarea name="body" id="" cols="100" rows="20"><?= $result['body'] ?></textarea><br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="変更する">
    </form>
    
</body>
</html>