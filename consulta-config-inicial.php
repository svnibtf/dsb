<?php
header('Access-Control-Allow-Origin: *');
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");

$desenvolvimento = $_POST['desenvolvimento'];
//echo $desenvolvimento, '<br>';

if(isset($_SESSION))$retorno = $_SESSION;
$retorno['logado'] = 'erro';
if (isset($_SESSION['session_id'] ) || isset( $_SESSION['session_nome'] ) ){
	$retorno['logado'] = 'sucesso';
}

array_walk_recursive($retorno, 'encode_items');
echo json_encode($retorno);

function encode_items(&$item, $key){
    $item = utf8_encode($item);
}
?>