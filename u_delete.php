<?php
include("funcs.php");

//post
$u_delete = $_POST["u_delete"];
$id = $_POST["id"];
var_dump($u_delete);
var_dump($id);

//DB
$pdo = db_conn();

//update
//多分こいつが動いていない。
$stmt = $pdo->prepare(u_update());
//bindValue
$stmt = bindInt($stmt,":u_delete",$u_delete);
//execute
$status = $stmt->execute();
//redirect
// if($u_delete == 0){
//     redirect("./login.php");
// }else{
//     redirect("./index.php");
// }

?>