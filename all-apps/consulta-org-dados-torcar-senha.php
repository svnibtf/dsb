<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

$session_id 		= $_SESSION['session_id'];
//$session_id 		= 1;

$dados_array = array();
$sql = $conexao->query("SELECT
				nome, sobrenome, email
				FROM usuarios
				WHERE
					id = '$session_id'
				");					
$dados_array = $sql->fetch_assoc();

echo json_encode($dados_array);
?>