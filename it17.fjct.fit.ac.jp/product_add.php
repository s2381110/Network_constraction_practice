<?php
// product_add.php

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    // 画像ファイル処理
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        // 許可する画像形式
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        // バリデーション
        if (!in_array($image_ext, $allowed_extensions)) {
            echo '許可されていない画像形式です。';
            exit;
        }
        if ($image_size > 5 * 1024 * 1024) { // 5MB制限
            echo '画像サイズが大きすぎます。';
            exit;
        }

        // 保存先ディレクトリ
        $upload_dir = 'uploads/'; 
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0755, true); 
        }

        // ファイル名の重複回避
        $unique_filename = uniqid() . '.' . $image_ext; 
        $image_path = $upload_dir . $unique_filename;

        // ファイルの移動
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // データベースにファイルパスを登録
            // ...
        } else {
            echo '画像のアップロードに失敗しました。';
            exit;
        }
    } else {
        // 画像がアップロードされなかった場合の処理
        // ...
    }

    try {
        // 商品情報を登録
        $sql = "INSERT INTO products (name, description, price, stock, image_path) 
                VALUES (:name, :description, :price, :stock, :image_path)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':stock', $stock);
        $stmt->bindValue(':image_path', $image_path); // 画像パスをバインド
        $stmt->execute();

        // 商品一覧ページにリダイレクト
        header('Location: product_list.php');
        exit;

    } catch (PDOException $e) {
        echo 'データベースエラー: ' . $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>商品登録</title>
</head>
<body>

<h1>商品登録</h1>

<form action="" method="post" enctype="multipart/form-data"> 
    <label for="name">商品名:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="description">商品説明:</label><br>
    <textarea id="description" name="description"></textarea><br>

    <label for="price">価格:</label>
    <input type="number" id="price" name="price" required><br>

    <label for="stock">在庫数:</label>
    <input type="number" id="stock" name="stock" required><br>

    <label for="image">商品画像:</label>
    <input type="file" id="image" name="image"><br>

    <button type="submit">登録</button>
</form>

</body>
</html>