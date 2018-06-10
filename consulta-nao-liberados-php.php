<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("include/functions.php");
//include_once("php-email/phpmailer/class.phpmailer.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

if(isset($_SESSION['session_id'])){
	$session_id = $_SESSION['session_id'];
} 

if($desenvolvimento_interno){
	$session_id = 4;
}

$item_dados_db = array();


echo json_encode($item_dados_db);
?>