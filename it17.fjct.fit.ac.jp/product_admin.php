<?php
// product_admin.php

require_once 'db_connect.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>商品管理</title>
  <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div id="container">

  <nav id="nav"> 
    <ul id="menu">
      <li><a href="product_admin.php">商品管理</a></li>
      <li><a href="order_list.php">注文管理</a></li>
      <li><a href="user_list.php">ユーザー管理</a></li>
      <li><a href="#">設定</a></li> 
    </ul>
  </nav>

  <div id="content"> 
    <h1>商品管理</h1>

    <ul>
      <li><a href="product_list.php">商品一覧</a></li>
      <li><a href="product_add.php">商品登録</a></li>
      <li><a href="product_edit.php">商品編集</a></li> 
      <li><a href="product_delete.php">商品削除</a></li> 
    </ul>
  </div>

</div>

</body>
</html>