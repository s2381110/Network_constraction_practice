<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <style>
    .error {
      color: red;
      margin-bottom: 10px; 
    }
  </style>
</head>
<body>
  <div id="container">
    <header>
    </header>
    <main>
      <?php
        session_start(); // セッションを開始
        if (isset($_SESSION['login_error'])) {
          $error_message = htmlspecialchars($_SESSION['login_error'], ENT_QUOTES, 'UTF-8');
          echo "<p class='error'>{$error_message}</p>";
          unset($_SESSION['login_error']); // エラーメッセージを表示したらセッション変数を削除
        }
      ?>
      <form action="login.php" method="post">
        <p>ユーザー名</p>
        <input type="text" name="username" autocomplete="off" required>
        <p>パスワード</p>
        <input type="password" name="password" required>
        <input class="btn" type="submit" value="ログイン">
      </form>
    </main>
    <footer>
    </footer>
  </div>
</body>
</html>