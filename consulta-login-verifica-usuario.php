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

// $senha 			= 'DSB@mapa';
// $senha 			= '123456';
// $email 			= 'hsfradinho@gmail.com';

// $senha 			= 'DSB@mapa';
// $email 			= 'hsfradinho@hotmail.com';

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
	//echo '<pre> dados_array =  ', print_r($dados_array,true); 
	
	if(!$dados_array){
		$retorno['login'] = 2;
	} else {
		/////////// DADOS DA MÁQUINA E SEQUENCIA //////////
			$MACHINE_CODE = 179223;
			$SEQUENCIA = 'DSB - Double';
		/////////// //////////////////////////// //////////
		if($dados_array['emailvalidado'] == 0){
			$validar = validar_email_llv($SEQUENCIA, $email, $MACHINE_CODE);
			//$validar = 7;	
			//echo 'validar = ' . $validar . '<br>';
			if($validar == 4){ /// ESTA CADASTRADO NA MAQUINA CERTA E FALTA SOMENTE VALIDAR			
				$retorno['login'] = 4;	
			} else if($validar == 5){/////CADASTRADO NO BANCO E NO LLV SEM MÁQUINA			
				$retorno['login'] = 5;
			} else if($validar == 7){/////CADASTRADO NO BANCO E NO LLV EM OUTRA MÁQUINA			
				$retorno['login'] = 7;
			} else if($validar == 1){/////CADASTRADO NO BANCO E NO LLV NA MÁQUINA CERTA
				$sql_up =	"UPDATE usuarios
									SET 
										emailvalidado = 1
									WHERE
										email = '$email'";
				$conexao->query($sql_up);
			} else if($validar == 8){/////CADASTRADO NO BANCO E NAO NO LLV OU HARD BOUNCE	
				$retorno['login'] = 8;
			}  else if($validar == 9){/////ERRO AO ACESSAR O BANCO NO LLV
				$retorno['login'] = 9;
			}
		}
	
		if($dados_array['emailvalidado'] == 1 || $validar == 1){/////CADASTRADO NO BANCO E NO LLV NA MÁQUINA CERTA
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
		
	}
	
	$_SESSION['login'] = $retorno['login'];
}

echo json_encode($retorno);


function validar_email_llv($SEQUENCIA, $email, $MACHINE_CODE){
	$validado = 9; //// SEM MÁQUINA - NÃO CADASTRADO OU EMAIL INVÁLIDO
	$dados_db = $array_test = array();
	$url = 'http://llapi.leadlovers.com/webapi';
	$curl = curl_init();
	
	//////// EMAIL HARD BOUNCE  - $email = 'kekeuprincesinhadedejesus@gmail.com';
		
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url . "/leadlocation" . "?token=" . "27878BEE2450468DB9EEF4377FE5B17B" . "&email=" . $email,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"accept: application/json",
			"authorization: bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVfbmFtZSI6IldlYkFwaSIsInN1YiI6IldlYkFwaSIsInJvbGUiOlsicmVhZCIsIndyaXRlIiwicmVhZGRhc2giXSwiaXNzIjoiaHR0cDovL3dlYmFwaWxsLmF6dXJld2Vic2l0ZXMubmV0IiwiYXVkIjoiMWE5MThjMDc2YTViNDA3ZDkyYmQyNDRhNTJiNmZiNzQiLCJleHAiOjE1OTg3MDgyNzMsIm5iZiI6MTQ2OTEwODI3M30.SBSYmUSrWKSDcpP-dUegMTdq0COOd079OY4HgC2f70I"
		),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		//echo "cURL Error #:" . $err;
		$validado = 0;
	} else {
		if($response != ''){
			$dados_maquina_db = get_object_vars(json_decode($response));
			$dados_maquina =  (array) $dados_maquina_db;
		}		
		if(isset($dados_maquina_db['StatusCode'])){
			$validado = 8;
		}
	}	
	
	//echo "validado = " . $validado  . '<BR>';
	//echo '<pre> response ', print_r($response,true), '</pre>';
	
	$dados = array();
	if(isset($dados_maquina['Items']) && $validado != 0){	
		//echo '<pre>', print_r($dados_maquina['Items'],true), '</pre>';		
		foreach($dados_maquina['Items'] AS $key => $valor ){
			$dados[$key] = (array) $dados_maquina['Items'][$key];
		}
		///////MAQUINA E SEQUENCIA ESPECÍFICA E FUNÇÃO PARA TRATAMENTO DO ARRAY//////
		$validado = 7;
		foreach($dados AS $key => $valor ){
			if($dados[$key]['MachineCode'] == $MACHINE_CODE){/// ESTA VINCULADO NA MAQUINA CERTA				
				//echo '<pre>', print_r($valor,true), '</pre>';
				//echo "SEQUENCIA // " . $dados[$key]['SequenceCode'] . ' = ' . $SEQUENCIA . '<BR>';
				if($dados[$key]['SequenceName'] == $SEQUENCIA){
					$validado = 4; /// ESTA VINCULADO NA MAQUINA CERTA E VALIDADO
				} else {
					$validado = 1;  /// ESTA VINCULADO NA MAQUINA CERTA E FALTA SOMENTE VALIDAR
				}
			}
		}		
	}
	
	return $validado;
}
?>