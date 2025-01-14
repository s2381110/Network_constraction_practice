<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link rel="stylesheet" href="stylesheet.css" type="text/css">
  <style>
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div id="container">
    <header>
    </header>
    <main>
      <?php
        if (isset($_GET['error'])) {
          $error_message = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
          echo "<p class='error'>{$error_message}</p>";
          unset($_SESSION['error']);
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