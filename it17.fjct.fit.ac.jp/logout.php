<?php
session_start();
session_destroy();
header("Location: index.php"); // ログインページにリダイレクト
exit();
?>