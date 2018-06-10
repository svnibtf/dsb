<?php
header('Access-Control-Allow-Origin: *');
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
//$_SESSION['session_permissao_id'] = 80;
//$_SESSION['session_id'] = '1';
$desenvolvimento = $_POST['desenvolvimento'];
//echo $desenvolvimento, '<br>';
$retorno['log'] = 'erro';
if (!isset($_SESSION['session_id'] ) || !isset( $_SESSION['session_nome'] ) ){
	$retorno['log'] = 'sucesso';
}
//else {
//	//echo 'retorno:false <br>';
//	$retorno = $_SESSION;
//	if(isset($_SESSION['session_id']) && $_POST['page'] == 'index-ios-tablet-sesi.html'){
//	$retorno = array('page');
//	 $_SESSION = [];	
//	} else {
//}
$retorno = $_SESSION;
//echo '<pre>', print_r($retorno,true);

array_walk_recursive($retorno, 'encode_items');
echo json_encode($retorno);

function encode_items(&$item, $key){
    $item = utf8_encode($item);
}
?>