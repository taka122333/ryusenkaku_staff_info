<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフアカウント登録</title>
</head>
<body>
    <h1>【従業員専用】スタッフアカウント登録</h1>
    <form method="post" action="account_register_check.php">
        名前<br>
        <input type="text" name="staff_name" required><br>
        パスワード<br>
        <input type="password" name="login_pass" required><br>
        パスワード確認<br>
        <input type="password" name="login_pass2" required><br>
        <br>
        <input type="submit" value="登録する">
    </form>
</body>
</html>