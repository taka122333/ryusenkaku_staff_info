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
    echo '<a href="../logout/staff_logout.php">ログアウト</a>';
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集履歴</title>
</head>
<body>
    <h1>編集履歴一覧</h1>
    <?php
    try {
        require_once('../common/security.php');
        require_once('../common/db_config.php');
        require_once('../common/wraptext.php');
        
        $login_id = $_SESSION['login_id'];

        $sql = 'SELECT * FROM comment_keep';
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dbh = null;
    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
        exit;
    }
    ?>
    <table border=1>
        <tr>
            <th>編集者</th>
            <th>更新日時</th>
            <th>投稿日</th>
            <th>タイトル</th>
            <th>内容</th>
            <th></th>
        </tr>
        <?php
        foreach ($result as $row) {
            echo '<tr>';
            echo '<td>' . $row['login_id'] . '</td>';
            echo '<td>' . $row['real_time'] . '</td>';
            echo '<td>' . $row['date'] . '</td>';
            echo '<td>' . nl2br(wrapText($row['title'], 15)) . '</td>';
            echo '<td>' . mb_substr($row['body'], 0, 20) . '</td>';
            echo '<td><a href="../crud/detail/detail.php?id=' . $row['id'] . '">詳細</a></td>';
            echo '</tr>';
        } 
        ?>
    </table>
    
</body>
</html>