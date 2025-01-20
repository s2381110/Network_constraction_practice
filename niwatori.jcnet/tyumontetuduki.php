<?php
session_start();

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // データの受け取り
    $last_name = $_POST['surname'];
    $first_name = $_POST['name'];
    $last_name_kana = $_POST['surname_kana'];
    $first_name_kana = $_POST['name_kana'];
    $email = $_POST['email'];
    $postal_code = $_POST['postal_code'];
    $prefecture = $_POST['prefecture'];
    $city = $_POST['city'];
    $address2 = $_POST['building'];
    $tel = $_POST['tel'];

    // 入力値をセッション変数に保存
    $_SESSION['user_data'] = [
        'surname' => $last_name,
        'name' => $first_name,
        'surname_kana' => $last_name_kana,
        'name_kana' => $first_name_kana,
        'email' => $email,
        'postal_code' => $postal_code,
        'prefecture' => $prefecture,
        'city' => $city,
        'address2' => $address2,
        'tel' => $tel,
    ];

    // 確認画面にリダイレクト
    header('Location: zyouhokakunin.php');
    exit;
}

// セッション変数から入力値を取得 (確認画面から戻ってきた場合)
$user_data = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : [];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<title>注文手続き確認</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
		}

		form {
			max-width: 600px;
			margin: auto;
		}

		label,
		input {
			display: inline-block;
			margin-bottom: 10px;
		}

		input[type="text"],
		input[type="email"] {
			width: 48%;
			/* 幅を調整して横に並べる */
			padding: 8px;
			box-sizing: border-box;
		}

		.required:after {
			content: " *";
			color: red;
		}

		.submit-button {
			display: block;
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

		.name-group {
			display: flex;
			justify-content: space-between;
		}
	</style>
</head>

<body>
	<h1>注文手続き確認</h1>
	<form action="" method="post">
		<div class="name-group">
			<div>
				<label for="surname" class="required">お名前（姓）</label>
				<input type="text" id="surname" name="surname" value="<?php echo isset($user_data['surname']) ? htmlspecialchars($user_data['surname'], ENT_QUOTES, 'UTF-8') : ''; ?>"
				    required>
			</div>
			<div>
				<label for="name" class="required">お名前（名）</label>
				<input type="text" id="name" name="name" value="<?php echo isset($user_data['name']) ? htmlspecialchars($user_data['name'], ENT_QUOTES, 'UTF-8') : ''; ?>" required>
			</div>
		</div>

		<div class="name-group">
			<div>
				<label for="surname_kana" class="required">フリガナ（セイ）</label>
				<input type="text" id="surname_kana" name="surname_kana" value="<?php echo isset($user_data['surname_kana']) ? htmlspecialchars($user_data['surname_kana'], ENT_QUOTES, 'UTF-8') : ''; ?>"
				    required>
			</div>
			<div>
				<label for="name_kana" class="required">フリガナ（メイ）</label>
				<input type="text" id="name_kana" name="name_kana" value="<?php echo isset($user_data['name_kana']) ? htmlspecialchars($user_data['name_kana'], ENT_QUOTES, 'UTF-8') : ''; ?>"
				    required>
			</div>
		</div>

		<label for="email" class="required">メールアドレス</label>
		<input type="email" id="email" name="email" value="<?php echo isset($user_data['email']) ? htmlspecialchars($user_data['email'], ENT_QUOTES, 'UTF-8') : ''; ?>"
		    required style="width: 100%;">

		<label for="email_confirm">メールアドレス確認のため再入力</label>
		<input type="email" id="email_confirm" name="email_confirm" value="<?php echo isset($user_data['email_confirm']) ? htmlspecialchars($user_data['email_confirm'], ENT_QUOTES, 'UTF-8') : ''; ?>"
		    style="width: 100%;">

		<label for="postal_code" class="required">郵便番号</label>
		<input type="text" id="postal_code" name="postal_code" value="<?php echo isset($user_data['postal_code']) ? htmlspecialchars($user_data['postal_code'], ENT_QUOTES, 'UTF-8') : ''; ?>"
		    required style="width: 100%;">

		<label for="prefecture" class="required">都道府県</label>
		<input type="text" id="prefecture" name="prefecture" value="<?php echo isset($user_data['prefecture']) ? htmlspecialchars($user_data['prefecture'], ENT_QUOTES, 'UTF-8') : ''; ?>"
		    required style="width: 100%;">

		<label for="city" class="required">市区町村・丁目・番地</label>
		<input type="text" id="city" name="city" value="<?php echo isset($user_data['city']) ? htmlspecialchars($user_data['city'], ENT_QUOTES, 'UTF-8') : ''; ?>" required
		    style="width: 100%;">

		<label for="building">マンション・ビル名など</label>
		<input type="text" id="building" name="building" value="<?php echo isset($user_data['building']) ? htmlspecialchars($user_data['building'], ENT_QUOTES, 'UTF-8') : ''; ?>"
		    style="width: 100%;">

		<label for="phone" class="required">電話番号</label>
		<input type="text" id="phone" name="phone" value="<?php echo isset($user_data['tel']) ? htmlspecialchars($user_data['tel'], ENT_QUOTES, 'UTF-8') : ''; ?>" required
		    style="width: 100%;">

		<input type="submit" value="確認" class="submit-button">
	</form>
</body>

</html>