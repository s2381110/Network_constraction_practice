<?php
session_start();

// セッション変数から入力値を取得
$user_data = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : [];

// 入力値がない場合は、前のページに戻す
if (empty($user_data)) {
    header('Location: tyumontetuduki.php');
    exit;
}

// セッション変数を破棄
unset($_SESSION['user_data']); 

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>注文情報確認</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .confirmation {
            max-width: 600px;
            margin: auto;
        }

        .confirmation h2 {
            margin-bottom: 10px;
        }

        .confirmation p {
            margin: 5px 0;
        }

        .confirmation strong {
            display: inline-block;
            width: 150px;
        }

        .submit-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }

        /* 新しいスタイル */
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
    </style>
</head>

<body>
    <div class="confirmation">
        <h1 class="store-name">
            <img src="path/to/logo.png" alt="にわとり文具" class="store-logo">

        </h1>
        <h1>注文情報確認</h1>
        <h2>お名前</h2>
        <p><strong>姓:</strong> <?php echo htmlspecialchars($user_data['surname'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>名:</strong> <?php echo htmlspecialchars($user_data['name'], ENT_QUOTES, 'UTF-8'); ?></p>

        <h2>フリガナ</h2>
        <p><strong>セイ:</strong> <?php echo htmlspecialchars($user_data['surname_kana'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>メイ:</strong> <?php echo htmlspecialchars($user_data['name_kana'], ENT_QUOTES, 'UTF-8'); ?></p>

        <h2>連絡先情報</h2>
        <p><strong>メールアドレス:</strong> <?php echo htmlspecialchars($user_data['email'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>郵便番号:</strong> <?php echo htmlspecialchars($user_data['postal_code'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>都道府県:</strong> <?php echo htmlspecialchars($user_data['prefecture'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>市区町村・丁目・番地:</strong> <?php echo htmlspecialchars($user_data['city'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>マンション・ビル名:</strong> <?php echo htmlspecialchars($user_data['building'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>電話番号:</strong> <?php echo htmlspecialchars($user_data['tel'], ENT_QUOTES, 'UTF-8'); ?></p>

        <a href="tyumonkakutei.html" class="submit-button">注文を確定する</a>
        <a href="tyumontetuduki.php" class="submit-button"
            style="background-color: #d3d3d3; color: black;">情報を修正する</a> 
    </div>
</body>

</html>