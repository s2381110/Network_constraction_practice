<?php
session_start();

if(!isset($_SESSION['user_id'])){
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head><meta charset="UTF-8"><title>注文一覧</title></head>
<body>
    <h1>注文一覧</h1>
    <table border="1">
        <tr>
            <th>注文ID</th>
            <th>ユーザーID</th>
            <th>住所</th>
            <th>連絡先</th>
            <th>注文日付</th>
            <th>合計金額</th>
            <th>状態</th>
            <th>注文内容</th>
        </tr>
        {% for order in orders %}
        <tr>
            <td>{{ order.id }}</td>
            <td>{{ order.user_id }}</td>
            <td>{{ order.user.address }}</td>
            <td>{{ order.user.contact }}</td>
            <td>{{ order.order_date.strftime('%Y-%m-%d %H:%M:%S') }}</td>
            <td>{{ order.total_amount }}</td>
            <td>{{ order.status }}</td>
            <td>
                <ul>
                {% for item in order.order_items %}
                    <li>{{ item.product_id }} - {{ item.quantity }}個</li>
                {% endfor %}
                </ul>
            </td>
        </tr>
        {% endfor %}
    </table>
    <a href="logout.php">ログアウト</a>
</body>
</html>