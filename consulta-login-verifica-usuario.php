<?php
include_once("connections/define.php");
// INSERE AUTOMATICAMENTE OS CAMPOS POST E GET
// KEY = VALOR
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
session_unset();
include_once("include/functions.php");

$desenvolvimento_echo = false;
if($desenvolvimento_frd){
	
//	$senha 		= '123456';
//	$email 		= 'teste@hotmail.com';

$senha 			= '123456';
$email 			= 'hsfradinho@gmail.com';

	//$senha 			= '123456';
	//$email 			= 'pedrohenriquematosandrade@hotmail.com';

//	$senha 			= 'ales2011';
//	$email 			= 'michelle.thomazini@gmail.com';

	
	/////////////////RETORNOS LOGIN//////////
	////////// 	login = 0 => erro na pagina;
	////////// 	login = 1 => login ok
	////////// 	login = 2 => email não cadastrado
	////////// 	login = 3 => senha incorreta
	///////////////////////////////////////
}

$retorno['login'] = $retorno['session_id'] = $dados_array = 0;
$data_final = '';
$dados_array = $dados_mat_rel = array();
$local = $_SERVER['HTTP_HOST'];
if(isset($email)){
	$senha_original = $senha;
	$senha = trim($senha);
	$senha = md5($senha);

	$sql = $conexao->query("
							SELECT * 
							FROM usuarios
							WHERE deletado=0 
							AND  email = '$email'
							");
	while($dados = $sql->fetch_assoc()) {
			$dados_array = $dados;
	}
	if($desenvolvimento_echo) echo '<pre> dados_array =  ', print_r($dados_array,true); 

	if(!$dados_array){
		$retorno['login'] = 2;
	} else {
		if($dados_array['senha'] == $senha){
			$_SESSION['session_local'] = $local;
			foreach($dados_array AS $key => $dados){
				if($key !='senha'){
					$_SESSION['session_'.$key] = $dados;
				}
			}			
			//////////// DATA ATUAL ///////////////
			$dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
			$datetime_now = new DateTime(date("Y-m-d"), $dtz);
			if($_SESSION['session_id'] == 1) $datetime_now = new DateTime('2018-07-24');
			$datetime_now_str = $datetime_now->format("Y-m-d");
			
			//if($desenvolvimento_echo) echo'<pre> planos ', print_r($planos,true);
		
			$retorno['login'] = 1;		

	/////// INSERE PRIMEIRO E DATA DE ACESSO ///////////////
			if($dados_array['first'] == 1){ 
			
				$sql_update_dp = "UPDATE usuarios_dados_pessoais
									SET 
									data_acesso = now()
									WHERE usuario_id = '".$dados_array['id']."'
									";
				$conexao->query($sql_update_dp);
				
			} else if($dados_array['first'] == 0){
				
				$sql_update_first = "UPDATE usuarios
										SET 
										first = '1'
										WHERE id = '".$dados_array['id']."'
										";
				
				if($conexao->query($sql_update_first)){;	
									
				$sql_insert_first = "INSERT INTO usuarios_dados_pessoais
							(udp_id, usuario_id, data_acesso_inicial)
							VALUES ('".$dados_array['id']."', '".$dados_array['id']."', now())
							";	
				$conexao->query($sql_insert_first);	
									
				}					 
			}			
			
			$sql = $conexao->query("
								SELECT info_inicial, data_acesso_inicial
								FROM usuarios_dados_pessoais
								WHERE usuario_id ='".$_SESSION['session_id']."'
								");
		
			$dados_info_inicial = $sql->fetch_assoc();
			$_SESSION['session_info_inicial'] = $dados_info_inicial['info_inicial'];
			
			if($dados_info_inicial['data_acesso_inicial'] == '0000-00-00 00:00:00'){
				$sql_update_dp = "UPDATE usuarios_dados_pessoais
									SET 
									data_acesso_inicial = now()
									WHERE usuario_id = '".$dados_array['id']."'
									";
				$conexao->query($sql_update_dp);
			}						
					 		
		} else {
			(isset($email))?$retorno['login'] = 3: $retorno['login'] = 0;
		}
	}
	
	$_SESSION['login'] = $retorno['login'];
}

echo json_encode($retorno);

?>