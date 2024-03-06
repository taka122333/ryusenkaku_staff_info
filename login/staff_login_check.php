<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ログインチェック</title>
</head>
<body>
    <?php
    try {
        require_once('../common/security.php');

        $post = sanitize($_POST);
        $login_id = $post['login_id'];
        $login_pass = md5($post['login_pass']);

        if ($login_pass != md5('pass')) {
            echo 'パスワードが間違っています。<br>';
            echo '<br>';
            echo '<a href="../staff_login.html">ログイン画面へ</a>';
            exit;
        } else {
            header('Location: ../staff_info.php');
            session_start();
            $_SESSION['staff_login'] = 1;
            $_SESSION['login_id'] = $login_id;
        }
    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
    }
    ?>
</body>
</html>