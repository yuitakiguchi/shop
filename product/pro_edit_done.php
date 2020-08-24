<?php

require_once('../common/common.php');

try {
  $pro_id = $_POST['id'];
  $pro_name = $_POST['name'];
  $pro_price = $_POST['price'];
  $pro_image_name = $_POST['image_name'];

  $dbh = connectDB();

  $sql = 'update product set name=?, price=?, image=? where id=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_image_name;
  $data[] = $pro_id;
  $stmt->execute($data);

  $dbh = null;

  echo $pro_name . ' を編集しました<br>';
} catch (Exception $e) {
  echo '何かしらのエラーが発生しています';
  echo $e->getMessage();
  exit();
}

echo '<a href="pro_list.php">商品一覧ページへ</a>';