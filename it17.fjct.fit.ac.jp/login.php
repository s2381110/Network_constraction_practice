<?php
session_start();

// データベースの接続情報
$db_config = [
    'host' => 'localhost',
    'dbname' => 'auth_db',
    'username' => 'niwatori',
    'password' => 'KuSn6AQt**VYxwu@',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if (empty($username) || empty($password)) {
        $error = 'ユーザー名とパスワードを入力してください。';
    } else {
        try {
            $pdo = new PDO(
                'mysql:host=' . $db_config['host'] . ';dbname=' . $db_config['dbname'] . ';charset=utf8',
                $db_config['username'],
                $db_config['password']
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
            $stmt->bindValue(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: kanrityumon.html');
                exit;
            } else {
                $error = 'ユーザー名またはパスワードが間違っています。';
            }
        } catch (PDOException $e) {
            // エラーログに記録
            error_log('データベースエラー: ' . $e->getMessage());
            $error = 'エラーが発生しました。';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>ログイン</title>
</head>
<body>
  <?php if (isset($error)): ?>
    <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
  <?php endif; ?>
</body>
</html>