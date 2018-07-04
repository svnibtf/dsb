<?php
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

$session_id 		= $_SESSION['session_id'];
//$session_id 			= 15;

$retorno['cadastro'] = 'erro';
$item_dados_db = $dados = array();
$sql = $conexao->query("
					UPDATE usuarios 
					SET $campo = '$valor'
					WHERE 
					id = '".$session_id."'
					");								

$retorno['cadastro'] = 'sucesso';

echo json_encode($retorno);
?>