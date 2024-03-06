<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン失敗</title>
</head>
<body>
    スタッフログインに失敗しました。<br>

    <?php
    try {
        
    } catch (PDOException $e) {
        echo 'エラー発生: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES);
    }
    ?>
</body>
</html>