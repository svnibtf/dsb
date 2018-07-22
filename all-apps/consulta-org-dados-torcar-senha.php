<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);
$where = '';
$dados_array['dados_usuario'] = 'erro';

if(isset($_SESSION['session_id'])){
	$session_id = $_SESSION['session_id']; 
	$where = "id = '$session_id'";
}

if(isset($code) && isset($email)){
	$where = "email = '$email' AND email = '$email'";
}

$sql = $conexao->query("SELECT
				nome, sobrenome, email
				FROM usuarios
				WHERE
					$where
				");
$dados = $sql->fetch_assoc();									
if(isset($dados))$dados_array['dados_usuario'] = $dados;

echo json_encode($dados_array);
?>