<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフアカウント登録確認</title>
</head>
<body>
    <h1>スタッフアカウント登録確認</h1>

    <?php
    require_once __DIR__ . '/../common/security.php';
    $post = sanitize($_POST);
    $staff_name = $post['staff_name'];
    $login_pass = md5($post['login_pass']);
    $login_pass2 = md5($post['login_pass2']); 
    ?>
    <?php if ($login_pass != $login_pass2) { ?>
        パスワードと確認用パスワードが一致しません。<br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
    <?php } else { ?>
        こちらの内容で登録します。<br>
        <br>
        名前:<?= $staff_name ?><br>
        <br>
        <form method="post" action="./account_register_done.php">
            <input type="hidden" name="staff_name" value="<?= $staff_name ?>">
            <input type="hidden" name="login_pass" value="<?= $login_pass ?>">
            <input type="button" onclick="history.back()" value="戻る">
            <input type="submit" value="登録">
        </form>
    <?php } ?>
</body>
</html>