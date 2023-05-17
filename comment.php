<?php
session_start();
//入力チェック（受信確認処理追加）
if(
    !isset($_POST["comment"]) || $_POST["comment"] == ""
){
    exit('ParamError');
}

// 1. POSTデータ所得
$comment = $_POST["comment"];
$user_id_id = $_SESSION["user_id_id"];
$user_name = $_SESSION["user_name"];
$_SESSION["user_name"];
$animal = $_SESSION["animal"];

// // 2.DB接続(エラー処理追加)
try{
    $pdo = new PDO('mysql:dbname=gs_db; charset=utf8;host=localhost', 'root','');
} catch(PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_articles_table";
$stmt = $pdo->prepare($sql);

//3. 抽出データ数を取得
$val = $stmt -> fetch();
$_SESSION["article_id"] = $val["id"];

// // 3. データ登録SQL作成
$sql = "INSERT INTO gs_comment_table(id, articles_id, user_name, user_animal, comment)
VALUES(Null, :a1, :a2, :a3, :a4)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":a1", $article_id, PDO::PARAM_INT);
$stmt->bindValue(":a2", $user_name, PDO::PARAM_STR);
$stmt->bindValue(":a3", $animal, PDO::PARAM_STR);
$stmt->bindValue(":a4", $comment, PDO::PARAM_STR);
$status = $stmt->execute();

// // // 4. データ登録処理後
if($status == false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    // 5.home.phpへリダイレクト
    header("Location: home.php");
    exit;
}





















?>