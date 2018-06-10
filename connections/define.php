<?php
header('Access-Control-Allow-Origin: *');
session_start();
//verificaLogin();
$desenvolvimento_externo = false;

if($desenvolvimento_externo){
define("DB_HOST",  "robb0254.publiccloud.com.br");
define("DB_NAME",  "institutoibtf1_ds_observatorio_db");
define("DB_LOGIN", "insti_ds_obs_db");
define("DB_SENHA", "Db@dsb@69");  

} else {

define("DB_HOST",  "localhost");
define("DB_NAME",  "admin_ds_observatorio_db");
define("DB_LOGIN", "root");
define("DB_SENHA", "Aq1Sw2De3");
}

//$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);

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

