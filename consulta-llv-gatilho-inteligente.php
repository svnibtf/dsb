<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

$text = '<br> TEXTO LEAD LOVER - GATILHO INTELIGENTE';
if(isset($_POST)){
	foreach($_POST AS $key => $value){
		$text .= '<br> campo = ' . $key . ' || valor = ' . $value; 
	}
}

$retorno = array();

$text .= '<br><br> //////////////////////////////////// <br><br> ';
$name = 'llv/arquivo.html';
$file = fopen($name, 'a');
fwrite($file, $text);
fclose($file);
if($desenvolvimento_interno){	
	$nome = 'Hamilton Silva';
	$email = 'hsfradinho@gmail.com';
}
$senha = 'DSB@mapa';
$senha_md5 = md5($senha);
$permissao_id = 10;


if(!isset($sbnome) || $sbnome == '0'){
	$sbnome = '';
	$pos1 	= stripos($nome, ' ');
	if($pos1 > 1){
		$sbnome = substr($nome,$pos1+1);
		$nome 	= substr($nome,0, $pos1);
	}
}
$retorno['usu_id'] = 0;
$sql = $conexao->query("
				SELECT id
				FROM usuarios
				WHERE 
					email = '".$email."'
				");
while($dados_id = $sql->fetch_assoc()){
	$dados = $dados_id;
	$retorno['usu_id'] = $dados_id['id'];///RETORNO ID USUÁRIO	
}

if($retorno['usu_id'] == 0){
	$sql_insert_usu = "INSERT INTO usuarios
								(nome, sobrenome, email, senha, permissao_id)
								VALUES ('$nome', '$sbnome', '$email', '$senha_md5', '$permissao_id')";
			
	$conexao->query($sql_insert_usu);
}

if($desenvolvimento_interno){	
	echo '<br> ' . $nome;
	echo '<br> ' . $sbnome;
	echo '<br> ' . $email;
	echo '<br> ' . $senha;
	echo '<br> ' . $senha_md5;
	echo '<br> ' . $permissao_id;	
}

if($desenvolvimento_frd)echo '<pre> retorno = ', print_r($retorno,true), '</pre>';

//echo json_encode($item_dados_db);
?>