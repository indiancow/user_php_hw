<?php
include("funcs.php");

//post
$mail = $_POST["mail"];
$upw = $_POST["upw"];
//DB
$pdo = db_conn();
$stmt = $pdo->prepare(l_select());
// $stmt = $pdo->prepare("SELECT * FROM user_table WHERE mail = :mail AND upw = :upw");
$stmt = bindStr($stmt,":mail",$mail);
$stmt = bindStr($stmt,":upw",$upw);
//実行させる。これがないと実行されない。
$status = $stmt->execute();
//DBを一行取得する
$v = $stmt->fetch();
//
if($v["l_flag"]!=1){
    redirect("login_ng.php");
}
// var_dump($v);
// echo $v["id"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?=$v["id"]?></h1>
    <h2>おかえり <?=h($v["uname"])?>さん</h2>
    <p>登録アドレス：<?=h($v["mail"])?> </p>
    <p>パスワード：<?=h($v["upw"])?> </p>
    <form method="post" action="./u_delete_check.php">
        <input name="id" value="<?=h($v["id"])?>" type="hidden">
        <button>退会</button>
    </form>
    <a href="./index.php">ホーム</a>
</body>
</html>