<?php
  function readText($fileName) {

    //ファイルオープン
    $filePointer = fopen($fileName, 'r');

    //1行ずつテキストを読み込み、配列str_arrayに格納
    $str_array = array();
    while(!feof($filePointer)) {
      $str = fgets($filePointer);
      array_push($str_array, $str);
    }

    return $str_array;

    //ファイルクローズ
    fclose($filePointer);
  }
 ?>
