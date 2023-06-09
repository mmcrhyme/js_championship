<?php
//入力チェック（受信確認処理追加）
if(
    !isset($_POST["user_id"]) || $_POST["user_id"] == ""||
    !isset($_POST["user_name"]) || $_POST["user_name"] == ""||
    !isset($_POST["user_password"]) || $_POST["user_password"] == ""
){
    exit('ParamError');
}

// 1. POSTデータ所得
$uid = $_POST["user_id"];
$name = $_POST["user_name"];
$password = $_POST["user_password"];
$animal = $_POST["animal"];

// 2.DB接続(エラー処理追加)
try{
    $pdo = new PDO('mysql:dbname=gs_db; charset=utf8;host=localhost', 'root','');
} catch(PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}

// 3. データ登録SQL作成
$sql = "INSERT INTO gs_user_table(id, user_name, user_id, pw, animal, indate )
VALUES(Null, :a1, :a2, :a3, :a4, sysdate())";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":a1", $name, PDO::PARAM_STR);
$stmt->bindValue(":a2", $uid, PDO::PARAM_STR);
$stmt->bindValue(":a3", $password, PDO::PARAM_STR);
$stmt->bindValue(":a4", $animal, PDO::PARAM_STR);
$status = $stmt->execute();

// 4. データ登録処理後
if($status == false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    // 5.complete.htmlでアラート表示→first.phpへリダイレクト
    header("Location: complete.html");
    exit;
}





















?>