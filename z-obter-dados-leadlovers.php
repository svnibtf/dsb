<?php
$dados_db = array();


$url = 'http://llapi.leadlovers.com/webapi';
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => $url . "/lead" . "?token=" . "27878BEE2450468DB9EEF4377FE5B17B" . "&email=" . "carlafalchet@gmail.com",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIiwicmVhZGRhc2giXSwiaXNzIjoiaHR0cDovL3dlYmFwaWxsLmF6dXJld2Vic2l0ZXMubmV0IiwiYXVkIjoiMWE5MThjMDc2YTViNDA3ZDkyYmQyNDRhNTJiNmZiNzQiLCJleHAiOjE1OTg3MDgyNzMsIm5iZiI6MTQ2OTEwODI3M30.SBSYmUSrWKSDcpP-dUegMTdq0COOd079OY4HgC2f70I"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$dados_db['dados_pessoais'] = json_decode($response);
	//echo $response . '<br><br>';
}

$url = 'http://llapi.leadlovers.com/webapi';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url . "/leadlocation" . "?token=" . "27878BEE2450468DB9EEF4377FE5B17B" . "&email=" . "hsfradinho@hotmail.com",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "authorization: bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIiwicmVhZGRhc2giXSwiaXNzIjoiaHR0cDovL3dlYmFwaWxsLmF6dXJld2Vic2l0ZXMubmV0IiwiYXVkIjoiMWE5MThjMDc2YTViNDA3ZDkyYmQyNDRhNTJiNmZiNzQiLCJleHAiOjE1OTg3MDgyNzMsIm5iZiI6MTQ2OTEwODI3M30.SBSYmUSrWKSDcpP-dUegMTdq0COOd079OY4HgC2f70I"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$dados_maquina_db = get_object_vars(json_decode($response));
	$dados_maquina =  (array) $dados_maquina_db;
	
  //echo $response;
}

$dados = array();
foreach($dados_maquina['Items'] AS $key => $valor ){
	$dados[$key] = (array) $dados_maquina['Items'][$key];
}

///////FUNÇÃO PARA TRATAMENTO RECURSIVO DE ARRAY UTF8//////
array_walk_recursive($dados, 'DoubleOptIn');

function DoubleOptIn(&$item, $key){
  if($item == 'DSB - Double') echo 'true';
}

//echo '<pre>', print_r($dados,true);
?>