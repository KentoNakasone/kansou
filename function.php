<?php
  //gooラボAPIキー：5ffa560e2573e5bc7f1f290b4c997dd03580eb52f162e83c48385370c00b8a48

  function readText($fileName) {

    //ファイルオープン
    $filePointer = fopen($fileName, 'r');

    //1行ずつテキストを読み込み、配列str_arrayに格納
    $str_array = array();
    while(!feof($filePointer)) {
      $str = fgets($filePointer);
      array_push($str_array, $str);
    }

    //ファイルクローズ
    fclose($filePointer);

    //最後の要素にFalseが入っているため、削除
    array_splice($str_array, count($str_array) - 1, count($str_array) - 1);

    $str_array = array_map('trim', $str_array);
    return $str_array;
  }

  function postData($data){
    //リクエスト送信先のURL
    $url = 'https://labs.goo.ne.jp/api/shortsum';
    $url = trim($url);

    $headers = array(
      'Content-Type: application/x-www-form-urlencoded',
    );

    $options = array('http' => array(
      'method' => 'POST',
      'content' => $data,
      'header' => implode("\r\n", $headers),
    ));

    // file_get_contents
    $contents = file_get_contents($url, false, stream_context_create($options));

    // 出力
    echo $contents;

/*
    $ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		curl_setopt($ch, CURLOPT_POST, true);

    $data = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
    ));

		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
    echo $response;
		$info = curl_getinfo($ch);
		curl_close($ch);
*/
  }

  function shortSum($str_array) {
    //echo count($str_array);
    //発行されたapi_id
    $api_id = '5ffa560e2573e5bc7f1f290b4c997dd03580eb52f162e83c48385370c00b8a48';

    //パラメータ設定
    $data = array(
	     'api_id'=>$api_id,
       'review_list'=>$str_array
     );

    //JSON形式にエンコード
    //$data_json = json_encode($data);

    //中身確認用
    echo $data['review_list'][0];
    //var_dump($data_json);
    //$data_decode = json_decode($data_json, true);
    //echo $data_decode['review_list'][0].'<br>';

    //return $data_json;
    return $data;
  }
 ?>
