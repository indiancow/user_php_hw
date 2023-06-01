<?php
//DB接続
function db_conn(){
    try{
        //この変数でメンテナンスしやすくするよ。
        $db_name = "talent_management";
        $db_host = "localhost";
        $db_id = "root";
        $db_pw = "";
        //接続して
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    }//エラー出たら 
    catch(PDOException $e){
        //この文を表示して。
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//specialchara
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//redirect
function redirect($page){
    header('Location:'.$page);
    exit();
}

//SQL error
function sql_error($stmt){
    //errorInfo() →error情報を取得してくれる
    $error = $stmt->errorInfo();
    //その内容を表示
    exit('SQL error:'.$error[2]);
}

//SQL insert
function u_insert(){
    return "INSERT INTO user_table(uname,mail,upw,indate,l_flag,u_delete)VALUES(:uname,:mail,:upw,sysdate(),:l_flag,:u_delete);";
}

//SQL select
function l_select(){
    return "SELECT * FROM user_table WHERE mail = :mail AND upw = :upw";
}

//SQL id select
function id_select(){
    return "SELECT * FROM user_table WHERE id = :id";
}

//SQL UPDATE
function u_update(){
    return "UPDATE user_table SET u_delete = :u_delete WHERE id = :id";
}

//bindValue int
function bindInt($stmt,$bind,$var){
    $stmt->bindValue($bind,$var,PDO::PARAM_INT);
    return $stmt;
}
//bindValue str
function bindStr($stmt,$bind,$var){
    $stmt->bindValue($bind,$var,PDO::PARAM_STR);
    return $stmt;
}

?>