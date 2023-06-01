<?php
include("funcs.php");

//post
$id = $_POST["id"];

//DB
$pdo = db_conn();

//idをDBに入れる
$select = $pdo->prepare("SELECT * FROM user_table WHERE id = :id");
$select = bindInt($select,":id",$id);
$status = $select->execute();
//fetchでデータの行を取ってくる
$v = $select->fetch();
var_dump($v);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>退会　最終確認</title>
</head>
<body>
    <h2>本当に退会しますか？</h2>
    <form method="post" action="./u_delete.php">
        <select name="u_delete" id="">
            <option name="u_delete" value="1">はい</option>
            <option name="u_delete" value="0">いいえ</option>
            <input name="id" value="<?=h($v["id"])?>" type="hidden">
            <input type="submit">
        </select>
    </form>
</body>
</html>