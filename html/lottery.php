<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>楽天おみくじ！</title>
  <!--レスポンシブデザインに必要-->
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <!--cssの初期化用，必ず先頭に-->
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@3.0.2/destyle.min.css" media="screen and (min-width: 601px)">
  <link rel="stylesheet" href="../css/lottery.css">
  <!--googlefonts用-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!--if you wanna use it, type font-family: 'Yomogi', cursive;-->
  <link href="https://fonts.googleapis.com/css2?family=Yomogi&display=swap" rel="stylesheet">
  <!--fontawesome用-->
  <script src="https://kit.fontawesome.com/e435c5f384.js" crossorigin="anonymous"></script>
</head>

<body>
  <img class="sun-image" src="../image/sun.png">
  <h1>楽天おみくじ</h1>
  <div class="god-frame">
    <div class="hukidasi">
      <img src="../image/hukidasi.png">
      <p class="serif1">検索結果から<br>わしが商品を選んできてあげるのじゃ</p>
      <p class="serif2">欲しい商品のキーワードを<br>入力するのじゃ</p>
    </div>
    <img class="god-image" src="../image/god.jpeg">
  </div>
  <div class="input-frame">
    <form method="POST" action="result.php">
      <input class="keywordbox" type="text" name="keyword" placeholder="欲しい商品" required><br>
      <button type="submit" name="omikuzibutton">
        <img src="../image/omikuji.png">
      </button>
    </form>
  </div>

  <!--背景設定-->
  <div class="bg-frame ZigZag"></div>
  <!--jQuary使用用-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('.god-frame').fadeIn(2000);
    });

    var set;
    var repeat = function() {
      if ($('.serif1').is(':visible')) {
        $('.serif1').fadeOut(500);
        $('.serif2').fadeIn(500);
      } else {
        $('.serif1').fadeIn(500);
        $('.serif2').fadeOut(500);
      }
      set = setTimeout(repeat, 5000);
    }
    repeat();
  </script>
</body>

</html>