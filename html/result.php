<?php
$applicationid = 1062185259106686101;
$keyword = $_POST["keyword"];
//ページ数
$pages = mt_rand(1, 50);
// Jsonに含まれるItemの数
$hits = 30;
// $row番目のItemを表示
$row = mt_rand(0, 29);

$rakutenurl = "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?applicationId=$applicationid&keyword=$keyword&formatVersion=2&hits=$hits&page=$pages&imageFlag=1";

$searchdata = @file_get_contents($rakutenurl);
// データをデコード
$searchdata_array = json_decode($searchdata);
$itemExists = ($searchdata_array->{"Items"} != []);

if ($itemExists) {
  $desiredItem = $searchdata_array->{"Items"}[$row];

  $itemname = $desiredItem->{"itemName"};
  $itemprice = $desiredItem->{"itemPrice"};
  $itemurl = $desiredItem->{"itemUrl"};
  $itemimageurl = $desiredItem->{"mediumImageUrls"}[0];
  $itemid = $desiredItem->{"itemCode"};
  $itemid = explode(":", $itemid)[1];
  $shopurl = $desiredItem->{"shopUrl"};
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>楽天おみくじ！</title>
  <!--レスポンシブデザインに必要-->
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <!--cssの初期化用，必ず先頭に-->
  <link rel="stylesheet" href="https://unpkg.com/destyle.css@3.0.2/destyle.min.css" media="screen and (min-width: 601px)">
  <link rel="stylesheet" href="../css/result.css">
  <!--googlefonts用-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!--if you wanna use it, type font-family: 'Yomogi', cursive;-->
  <link href="https://fonts.googleapis.com/css2?family=Yomogi&display=swap" rel="stylesheet">
  <!--fontawesome用-->
  <script src="https://kit.fontawesome.com/e435c5f384.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  if ($itemExists) {
    echo "<h1>おみくじ結果！</h1>";
  } else {
    echo "<h1>おみくじ結果、、、</h1>";
  }
  ?>
  <div class="god-frame">
    <div class="hukidasi">
      <img src="../image/hukidasi.png">
      <?php
      if ($itemExists) {
        echo "<p>この商品がおすすめじゃよ</p>";
      } else {
        echo "<p>商品が見つからなかったのじゃ<br>ごめんなのじゃ</p>";
      }
      ?>
    </div>
    <img class="god-image" src="../image/god.jpeg">
  </div>
  <?php
  if ($itemExists) {
    echo "<div class='result-frame'>
  <img src=$itemimageurl>
  <h1>$itemprice 円</h1>
  <a href=$itemurl>$itemname</a>
  </div>";
  }
  ?>
  <!--背景設定-->
  <div class="bg-frame ZigZag"></div>

  <!--jQuary使用用-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    $.when(
      $('.god-frame').fadeIn(2000)
    ).done(function() {
      $('h1').fadeIn(2000)
      $('.result-frame').fadeIn(2000);
      $('.ZigZag').fadeIn(2000);
      $('body').css('background-color', 'transparent');
    });
  </script>
</body>

</html>