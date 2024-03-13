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
    <title>削除確認</title>
</head>
<body>
    <h1>本当に削除しますか？</h1>
    <?php
    try {
        require_once('../../common/security.php');
        require_once('../../common/db_config.php');
        
        $id = (int)$_GET['id'];

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
    <br>
    <form method="post" action="delete_done.php?id=<?= $result['id']; ?>">
        <input type="submit" value="削除する">
        <input type="button" onclick="history.back()" value="戻る">
    </form>
    

    
</body>
</html>