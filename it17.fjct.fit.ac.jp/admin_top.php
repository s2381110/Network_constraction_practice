<!DOCTYPE html>
<html>
<head>
  <title>管理画面</title>
  <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div id="container">

  <nav id="nav"> 
    <ul id="menu">
      <li><a href="product_admin.php">商品管理</a></li>
      <li><a href="order_list.php">注文管理</a></li>
      <li><a href="user_list.php">ユーザー管理</a></li>
    </ul>
  </nav>

  <div id="content"> 
    <h1>管理画面</h1>
    <p>ようこそ、管理者さん</p>

    <h2>ダッシュボード</h2>
    <ul>
      <li>受注数: </li>
      <li>売上: </li>
      <li>ユーザー数: </li>
    </ul>
  </div>

  <div id="hamburger"> 
    <span></span>
    <span></span>
    <span></span>
  </div>

</div>

<script src="admin_script.js"></script> 

</body>
</html>