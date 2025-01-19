<?php

try {
  $dsn = 'mysql:dbname=ec_site;host=localhost;charset=utf8';
  $user = 'ec_master'; // ユーザー名
  $password = 'Y3v86D3Kv/1RwSx3'; // パスワード
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo 'データベース接続エラー: ' . $e->getMessage();
  exit;
}

?>