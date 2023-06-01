<?php
include("funcs.php");

//post
$uname = $_POST["uname"];
$mail = $_POST["mail"];
$upw = $_POST["upw"];
$l_flag = $_POST["l_flag"];
$u_delete = $_POST["u_delete"];

//DB
$pdo = db_conn();

//SQLでDBを動かす。
//データをDBを入れる項目を指定
$u_insert = u_insert();
//データをDBに入れる準備？
$stmt = $pdo->prepare($u_insert);
//bindValueでDBに入れる
bindStr($stmt,":uname",$uname);
bindStr($stmt,":mail",$mail);
bindStr($stmt,":upw",$upw);
bindStr($stmt,":l_flag",$l_flag);
bindStr($stmt,":u_delete",$u_delete);
//準備した変数を実行する
$status = $stmt->execute();
if($status == false){
    sql_error($stmt);
} else{
    redirect("index.php");
}
//
?>