<?php
// index.php

require_once 'db_connect.php'; // データベース接続

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
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品一覧</title>
    <style>
        .nav-buttons {
            margin-bottom: 20px;
        }
        .nav-buttons a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            margin-right: 10px;
        }
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .product-item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .product-img {
            max-width: 100%;
            height: auto;
        }
                .store-name {
            font-family: 'Brush Script MT', cursive;
            font-size: 3em;
            text-align: center;
            color: #A52A2A;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .store-logo {
            max-height: 80px;
            /* ロゴの高さを調整してください */
            margin-right: 10px;
            /* テキストとの間隔 */
        }
        /* 新しいスタイル */
        .home-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
<a href="{{ url_for('home') }}" class="home-link">
    <h1 class="store-name">
        <img src="logo.png" alt="にわとり文具" class="store-logo">
        にわとり文具
    </h1>
        </h1>
        </h1>
      </a>
    <div class="nav-buttons">
        <a href="kato.html">カートの中身</a>
        <a href="{{ url_for('order_history') }}">注文履歴</a> 
        <a href="{{ url_for('account') }}">アカウント</a> 
    </div>
    
    <h1>商品一覧</h1>
    <div class="product-grid">
        <?php foreach ($products as $product): ?> 
            <div class="product-item">
                <img src="<?php echo htmlspecialchars($product['image_path'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>" class="product-img"> 
                <h3><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></h3> 
                <p><?php echo htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?></p> 
                <p><?php echo htmlspecialchars($product['price'], ENT_QUOTES, 'UTF-8'); ?>円</p> 
                <a href="#" class="add-to-cart">カートに入れる</a> 
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>