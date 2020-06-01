<?php
header('Access-Control-Allow-Origin: *');
$desenvolvimento_externo = false;
if($desenvolvimento_externo){
define("DB_HOST_IAPER",  "robb0254.publiccloud.com.br:3306");
define("DB_NAME_IAPER",  "iaper_db");
define("DB_LOGIN_IAPER", "iaper_db");
define("DB_SENHA_IAPER", "Iaper@qwe@69"); 

} else {

define("DB_HOST_IAPER",  "localhost");
define("DB_NAME_IAPER",  "iaper_db");
define("DB_LOGIN_IAPER", "root");
define("DB_SENHA_IAPER", "Aq1Sw2De3");

}

//////////// DATA ATUAL ///////////////
$dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
$datetime_now = new DateTime(date("Y-m-d H:i:s"), $dtz);
$datetime_now_str = $datetime_now->format("Y-m-d H:i:s");

//$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
//
//$item_dados_db = array();
//$sql = $conexao->query("
//			SELECT *
//			FROM usuarios
//			");
//while($dados = $sql->fetch_assoc()){
//	array_push($item_dados_db,$dados);
//}
//echo '<pre>', print_r($item_dados_db,true);
?>

