<?php
header('Access-Control-Allow-Origin: *');
include_once("connections/define.php");
include_once( "connections/define-iaper.php" );
// INSERE AUTOMATICAMENTE OS CAMPOS POST E GET
// KEY = VALOR
$conexao  		= new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
$conexao_iaper  = new mysqli(DB_HOST_IAPER, DB_LOGIN_IAPER, DB_SENHA_IAPER, DB_NAME_IAPER);
mysqli_set_charset($conexao, "utf8");
mysqli_set_charset($conexao_iaper, "utf8");

include_once("include/functions.php");

$desenvolvimento = $_POST['desenvolvimento'];
$desenvolvimento_echo = false;

if(isset($_SESSION))$retorno = $_SESSION;
$retorno['logado'] = 'erro';
if (isset($_SESSION['session_id'] ) || isset( $_SESSION['session_nome'] ) ){
	$retorno['logado'] = 'sucesso';
}

//$retorno['logado']

//if($desenvolvimento_echo) echo __LINE__ .  '<pre> retorno ', print_r($retorno,true), '</pre>';

array_walk_recursive($retorno, 'encode_items');
echo json_encode($retorno);

function encode_items(&$item, $key){
    $item = utf8_encode($item);
}
?>