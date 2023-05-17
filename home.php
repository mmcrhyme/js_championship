<?php
session_start();
// echo "こんにちは".$_SESSION["user_name"]."さん"; -->
?>

<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style2.css">
  <!-- <link rel="stylesheet" href="main.js"> -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>

<div class="header"></div>
<!-- /.header -->

<div class="content">
    <div class="page" id="user_page">
        <div id="user_prof">
            <div id="user_prof_img">
                <img src="./img/<?=$_SESSION["animal"]?>.png" alt="プロフィール画像">
            </div>
            <div><?="ID: ".$_SESSION["user_id"]."<br> Name: ".$_SESSION["user_name"]?></div>
        </div>
        <div id="user_post">
            <form action="post.php" method="post">
                <input type="text" name="title" placeholder="タイトル" style='width:80%;margin-bottom:5px;'>
                <textarea name="body" placeholder="内容" style='width:80%;height:200px;'></textarea><br>
                <button type="submit">投稿</button>
            </form>
        </div>
    </div>

    <div class="page" id="timeline">
        <?php
            try{
                $pdo = new PDO('mysql:dbname=gs_db; charset=utf8;host=localhost', 'root','');
            } catch(PDOException $e){
                exit('DbConnectError:'.$e->getMessage());
            }

            $stmt = $pdo->prepare("SELECT * FROM gs_articles_table ORDER BY created_at DESC");
            $status = $stmt->execute();

            $view = "";
            if($status == false){
                $error = $stmt->errorInfo();
                exit("ErrorQuery:".$error[2]);
            }else{
                while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
                    // $view .= "<p style='font-size:20px;'>";
                    // $view .= "<img src='./img/".$result["animal"].".png' style='width:130px;height:130px;'><br>";
                    // $view .= $result["user_name"]."<br>タイトル：";
                    // $view .= $result["title"]."<br>".$result["body"]."<br>";
                    // $view .= $result["created_at"]."</p>";
                    $view .= "<div style='font-size:20px; display:flex; justify-content:space-between; align-items: center;'>";
                    $view .= "<div style='width:200px; margin-left:20px;font-size:15px;'><img src='./img/".$result["animal"].".png' style='width:130px;height:130px;'><br>";
                    $view .= $result["user_name"]."</div><div style='width:600px; padding:30px;'><h5 style='font-weight:bold;'>タイトル：【";
                    $view .= $result["title"]."】</h5>".$result["body"]."</div><br><br><div><div style='padding:10px;'>";
                    $view .= $result["created_at"]."</div><button id='reply' style='font-size:15px;'>コメント</button></div></div>";?>
                    <div class="post">
                        <?=$view?>
                    </div><?php
                    $view = "";
                }
            }
            ?>
    </div>
    <div class="page" id="tag">
        <div id="res" style='height: 80%;'>
        </div>
        <div id="comment">
            <form action="comment.php" method="post">
                <textarea name="comment" placeholder="未実装" style='width:80%;height: 80px;'></textarea><br>
                <button type="submit">もうちょっと待ってね</button>
            </form>
        </div>
    </div>
</div>

<!-- /.content -->

      <div class="footer">
        <p>copyrights 2023 まるしぃ Tokyo All RIghts Reserved.</p>
      </div>
    <!-- /#footer -->

</body>

</html>