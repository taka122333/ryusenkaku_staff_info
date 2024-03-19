<?php
//使わない方をコメントアウト↓

//ローカル用
$user = 'suzuki';
$pass = 'password';
$dbh = new PDO('mysql:host=localhost;dbname=ryusenkaku;charset=utf8', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//サーバー用
// $user = 'xs144235_wp1';
// $pass = 'ここにパスワードを入れる';
// $dbh = new PDO('mysql:host=localhost;dbname=xs144235_wp1;charset=utf8', $user, $pass);
// $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
