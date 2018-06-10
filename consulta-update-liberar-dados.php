<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

if(isset($_SESSION['session_id']))$usuario_id = $_SESSION['session_id'];
$retorno['cadastro'] = 'erro';
$sql = "	UPDATE dados_obs 
					SET dbo_liberado = 1
					WHERE 
					dbo_id = '".$dbo_id."'";
//							

if(isset($_SESSION['session_id']) && $_SESSION['session_permissao_id'] > 50){
	if($conexao->query($sql)){
		$retorno['cadastro'] = 'sucesso';
	} else {
		$retorno['cadastro'] = 'erro';
	}
}
echo json_encode($retorno);
?>