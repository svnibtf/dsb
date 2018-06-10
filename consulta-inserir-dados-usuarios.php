<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");

$desenvolvimento_frd = true;
if($desenvolvimento_frd){
$_POST['senha'] 				= '123456';
$_POST['responsavel'] 	= '0';
$_POST['permissao_id']	= '10';
$_POST['nome'] 					= 'Hamilton';
$_POST['sbnome'] 				= 'Silva';
$_POST['email'] 				= 'hsfradinho@hotmail.com';
$_POST['api_key'] 			= '001llv0001';
}
include_once("include/functions.php");
//include_once("php-email/phpmailer/class.phpmailer.php");
//verificaLogin();
echo '<pre>_POST 	2 = ' . print_r($_POST,true);

if(isset($_SESSION['session_id'])){
	$session_id = $_SESSION['session_id'];
}

$item_dados_db = array();
$senha_md5 = md5($senha);
$retorno['cadastro'] = 'erro';

$sql = $conexao->query("
			SELECT id
			FROM usuarios
			WHERE 
				email = '$email'
			");

if($dados = $sql->fetch_assoc()){
	$item_dados_db['id'] = $dados;
}

if(!isset($item_dados_db['id'])){
	$sql_insert_usu = "INSERT INTO usuarios
									(nome, sobrenome, email, senha, permissao_id, responsavel)
									VALUES ('$nome', '$sbnome', '$email', '$senha_md5', '$permissao_id', '$responsavel')";
	$conexao->query($sql_insert_usu);
	$retorno['cadastro'] = 'sucesso';	
} else {
	$retorno['cadastro'] = 'email_ja_cadastrado';
}
							
echo json_encode($retorno);
?>