<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

<div id="container">
        <div class="sign-three">
          <div class="restaurant">MARU</div>
          <div class="bar">Chat</div>
          <div class="jackpots">OPEN</div>
        </div>
    </div>

   <form action="login.php" method="post" style="text-align:center;" >
     <input name="lid" placeholder="ユーザーID"><br>
     <input type="password" name="lpw" placeholder="パスワード"><br>
     <button type="submit" style="margin-top:10px;">ログインする</button>
   </form>
<h1 style="text-align:center;margin-top: 2em;margin-bottom: 1em; color:white" class="h1_log">初めての方はこちら</h1>
<form action="register.php" method="post" style="text-align:center;">
     <input name="user_id" placeholder="ユーザーID"><br>
     <input name="user_name" placeholder="ユーザー名"><br>
     <input type="password" name="user_password" placeholder="パスワード"><br>
     <p style="color:white;">好きな動物を選択（プロフィール画像になります）</p>
     <select name="animal">
      <option value="buta">ブタ</option>
      <option value="kuma">クマ</option>
      <option value="inu">イヌ</option>
      <option value="neko">ネコ</option>
      <option value="zou">ゾウ</option>
      <option value="uma">ウマ</option>
      <option value="lion">ライオン</option>
      <option value="sai">サイ</option>
      <option value="tora">トラ</option>
      <option value="usagi">ウサギ</option>
      <option value="panda">パンダ</option>
      <option value="saru">サル</option>
      <option value="pengin">ペンギン</option>
      <option value="hitsuji">ヒツジ</option>
      <option value="koara">コアラ</option>
      <option value="risu">リス</option>
     </select><br>
     <button id="register" type="submit" style="margin-top:10px;">新規登録する</button>
</form>


</body>
</html>