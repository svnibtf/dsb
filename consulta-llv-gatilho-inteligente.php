<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");

//verificaLogin();
//$_POST['email'] = 'adrianaclaro.ibtf@gmail.com';
//$_POST['nome']  = 'Adriana Claro';
//$_POST['tel_cel']  = '0';
//$_POST['municipio']  = 'Municipio';
//$_POST['estado']  = 'estado';
//$_POST['data']  = '19/06/2018 16:11:07';

include_once("include/functions.php");

$text = '<br> TEXTO LEAD LOVER - GATILHO INTELIGENTE';
$text .= '<br><br> //////////////////////////////////// <br><br> ';
if(isset($_POST)){
	foreach($_POST AS $key => $value){
		$text .= '<br> campo = ' . $key . ' || valor = ' . $value; 
	}
}

if(isset($_GET)){
	foreach($_GET AS $key => $value){
		$text .= '<br> campo = ' . $key . ' || valor = ' . $value; 
	}
}

//echo '<pre>', print_r($_POST,true), '</pre>';

$retorno = array();
$dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
$datetime_now = new DateTime(date("Y-m-d H:i:s"), $dtz);
$text .= '<br>' . date_format($datetime_now,"d/m/Y H:i:s");
$text .= '<br><br> //////////////////////////////////// <br><br> ';
 
$name = 'llv/arquivo.html';
$file = fopen($name, 'a');
fwrite($file, $text);
//fclose($text);

echo $text;

//$email = 'hsfradinho@gmail.com2';
//$nome = 'Hamilton Silva';
//$tel_cel = '0';
//$municipio = 'Municipio';
//$estado = 'estado';
//$data = '19/06/2018 16:11:07';



/*if(isset($email)){
	//echo '<pre>', print_r($_POST,true), '</pre>';
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
		echo '<br> nome = ' . $nome;
		echo '<br> sbnome = ' . $sbnome;
		echo '<br> email = ' . $email;
		echo '<br> senha = ' . $senha;
		echo '<br> senha_md5 = ' . $senha_md5;
		echo '<br> permissao_id = ' . $permissao_id;	
}

//if($desenvolvimento_frd)echo '<pre> retorno = ', print_r($retorno,true), '</pre>';
echo $text;*/

//echo json_encode($item_dados_db);
?>