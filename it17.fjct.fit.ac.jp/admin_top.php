<?php
// admin.php

require_once 'db_connect.php';

// データベースからデータを取得する処理などを記述

?>

<!DOCTYPE html>
<html>
<head>
  <title>管理画面</title>
  <link rel="stylesheet" href="admin_style.css"> 
</head>
<body>

<div id="container"> 

  <h1>管理画面</h1>

  <p>ようこそ、管理者さん</p>

  <h2>ダッシュボード</h2>

  <ul>
    <li>受注数: </li> 
    <li>売上: </li> 
    <li>ユーザー数: </li> 
  </ul>

  <h2>管理メニュー</h2>

  <ul>
    <li><a href="product_list.php">商品管理</a></li> 
    <li><a href="order_list.php">注文管理</a></li> 
    <li><a href="user_list.php">ユーザー管理</a></li> 
  </ul>

</div> 

</body>
</html>