<?php
  require_once('function.php');
?>

<html>

<head>

  <title>感想要約</title>
  <meta charset="utf-8">

</head>

<body>

  <?php
    //ファイル名指定
    $fileName = 'kansou.txt';

    $str_array = readText($fileName);

    /*
    foreach($str_array as $str) {
      echo "${str}<br>";
    }
    */

    $data = shortSum($str_array);
    postData($data)
  ?>

</body>

</html>
