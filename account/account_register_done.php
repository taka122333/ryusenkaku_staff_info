<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフアカウント登録完了</title>
</head>
<body>
    <h1>スタッフアカウント登録完了</h1>
    スタッフアカウントの登録が完了しました。<br>
    <br>
    <a href="../staff_login.html">スタッフログイン画面へ</a>
    <?php
    require_once __DIR__ . '/../common/db_config.php';
    require_once __DIR__ . '/../common/security.php';
    $post = sanitize($_POST);
    $staff_name = $post['staff_name'];
    $login_pass = $post['login_pass'];

    $sql = 'INSERT INTO login_account (staff_name,login_pass) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1, $staff_name, PDO::PARAM_STR);
    $stmt->bindValue(2, $login_pass, PDO::PARAM_STR);
    $stmt->execute();
    $dbh = null;
    ?>

</body>
</html>