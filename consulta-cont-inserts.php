<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("include/functions.php");
//include_once("php-email/phpmailer/class.phpmailer.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);
$estados = ["AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO"];
$num_leads = array();
foreach($estados AS $key => $est){
	$num_leads[$key] = 0;
}

$sql = $conexao->query("
			SELECT dbo_estado
			FROM dados_obs
			");
while($dados = $sql->fetch_assoc()){
	$pos = array_search($dados['dbo_estado'], $estados);
	$num_leads[$pos] ++ ;
}
echo json_encode($num_leads);
?>