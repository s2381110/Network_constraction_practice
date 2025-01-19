<?php
// product_list.php

require_once 'db_connect.php';

try {
    // 商品データを全件取得
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'データベースエラー: ' . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>商品一覧</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<h1>商品一覧</h1>

<a href="product_add.php">商品登録</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>画像</th> 
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product['product_id']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['stock']; ?></td>
                <td><img src="<?php echo $product['image_path']; ?>" alt="<?php echo $product['name']; ?>" width="100"></td> 
                <td>
                    <a href="product_edit.php?id=<?php echo $product['product_id']; ?>">編集</a>
                    <a href="product_delete.php?id=<?php echo $product['product_id']; ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>