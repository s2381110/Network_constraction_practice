<?php
// product_delete.php

require_once 'db_connect.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    try {
        // 削除対象の商品データを取得
        $sql = "SELECT image_path FROM products WHERE product_id = :product_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':product_id', $product_id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        // 画像ファイルを削除
        if ($product['image_path'] && file_exists($product['image_path'])) {
            unlink($product['image_path']);
        }

        // 商品を削除
        $sql = "DELETE FROM products WHERE product_id = :product_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':product_id', $product_id);
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