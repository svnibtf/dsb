<?php
include_once("connections/define.php");
//include_once( "connections/define-iaper.php" );
// INSERE AUTOMATICAMENTE OS CAMPOS POST E GET
// KEY = VALOR
$conexao  		= new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
//$conexao_iaper  = new mysqli(DB_HOST_IAPER, DB_LOGIN_IAPER, DB_SENHA_IAPER, DB_NAME_IAPER);
mysqli_set_charset($conexao, "utf8");
include_once("include/functions.php");

//////////// DATA ATUAL ///////////////
$dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
$datetime_now = new DateTime(date("Y-m-d H:i:s"), $dtz);
$datetime_now_str = $datetime_now->format("Y-m-d H:i:s");

//////CONFIGURAR E ATIVAR A PARTIR DA DATA DE INICIO DA PROMOCAO//////
$datetime_INICIO_PROMOCAO = new DateTime(date("2020-03-17"), $dtz); 
$numero_dias_promocao = 7;

if($desenvolvimento_echo){
	
//	$senha 		= '123456';
//	$email 		= 'teste@hotmail.com';

// $senha 			= 'DSB@mapa';
 $senha 			= '123456';
 $email 			= 'hsfradinho@gmail.com';
 //$_SESSION['session_id'] = 1;

// $senha 			= '123456';
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

//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  sql  = ' . $sql . '<br><br>';

if(isset($email)){
    if($senha == 'logado'){
      $senha = $_SESSION['session_usu_senha'];
    } else {
      $senha_original = $senha;
      $senha = trim($senha) . 'I@per';
      $senha = md5($senha);
      $senha_check = md5('000000I@per');
    }
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha  = ' . $senha . '<br><br>';
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha_check  = ' . $senha_check . '<br><br>';
  session_unset();
	$sql = $conexao->query("SELECT usu_id, usu_email, udp_primeiro_acesso, udp_permissao_pro_id, udp_usu_pro_id, udp_usu_senha, udp_usu_senha_alternativa, usu_email_validado, udp_info_inicial, udp_data_acesso_inicial, udp_usu_tipo, upr_id
							FROM iaper_db.usuarios
							INNER JOIN iaper_db.usuarios_dados_pessoais
								ON udp_usuario_id = usu_id AND udp_usu_pro_id = '" . $produto_id . "'
              LEFT JOIN iaper_db.usuarios_dados_profissionais
								ON upr_usuario_id = usu_id AND upr_usu_pro_id = '" . $produto_id . "'
							WHERE usu_email = '" . $email . "' AND usu_deletado = 0");
	
  $retirar = ['udp_permissao_pro_id', 'udp_usu_pro_id', 'udp_usu_senha', 'udp_usu_senha_alternativa'];
	while($dados = $sql->fetch_assoc()) {
    $dados_array = $dados;
    foreach($dados AS $key => $ddo){
      if(!in_array($key, $retirar)){
        
      }      
    }			
	}
  //$dados_array = '';

	
	//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha  = ' . $senha . '<br><br>';
	//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha_check  = ' . $senha_check . '<br><br>';
	
	//if($desenvolvimento_echo) echo __LINE__ .  '<pre> dados_array ', print_r($dados_array,true), '</pre>';
	
	if(!$dados_array){
		$retorno['login'] = 2;
	} else {
    $retorno['acao_modal']['acao']          = '0';
    $retorno['acao_modal']['plano']         = '0';
    $retorno['acao_modal']['passo']         = '0';
    $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_base'; 
		/////////// DADOS DA MÁQUINA E SEQUENCIA //////////
			$MACHINE_CODE = 179223;
			$SEQUENCIA = 'DSB - Double';
		/////////// //////////////////////////// //////////
		if($dados_array['usu_email_validado'] == 0){
			//$validar = validar_email_llv($SEQUENCIA, $email, $MACHINE_CODE);
			$validar = 1;	
			//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  validar  = ' . $validar . '<br><br>';
			if($validar == 4){/// ESTA CADASTRADO NA MAQUINA CERTA E FALTA SOMENTE VALIDAR			
				$retorno['login'] = 4;	
			} else if($validar == 5){/////CADASTRADO NO BANCO E NO LLV SEM MÁQUINA			
				$retorno['login'] = 5;
			} else if($validar == 7){/////CADASTRADO NO BANCO E NO LLV EM OUTRA MÁQUINA			
				$retorno['login'] = 7;
			} else if($validar == 1){/////CADASTRADO NO BANCO E NO LLV NA MÁQUINA CERTA
				$sql_up =	"UPDATE iaper_db.usuarios
									SET 
										usu_email_validado = 1
									WHERE
										usu_email = '$email'";
				$conexao->query($sql_up);
			} else if($validar == 8){/////CADASTRADO NO BANCO E NAO NO LLV OU HARD BOUNCE	
				$retorno['login'] = 8;
			}  else if($validar == 9){/////ERRO AO ACESSAR O BANCO NO LLV
				$retorno['login'] = 9;
			}
		}
		
		//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  udp_usu_senha  = ' . $dados_array[ 'udp_usu_senha' ] . '<br><br>';
		//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha_check  = ' . $senha_check . '<br><br>';
	
    $retorno['login'] = 4;
		if($dados_array['usu_email_validado'] == 1 || $dados_array[ 'udp_usu_senha' ] == $senha_check || $validar == 1){/////CADASTRADO NO BANCO E NO LLV NA MÁQUINA CERTA
      if($dados_array['udp_usu_senha'] == $senha || $dados_array[ 'udp_usu_senha_alternativa' ] == $senha){
				$_SESSION['session_local'] = $local;
				foreach($dados_array AS $key => $dados){
                    $key = substr($key, 4);
					if($key !='senha' || $key !='senha_alternativa'){
						$_SESSION['session_' . $key] = $dados;
					}
				}
				
				//if($desenvolvimento_echo) echo'<pre> planos ', print_r($planos,true);
			
				$retorno['login'] = 1;
        $retorno['session_id']      = $dados_array ['usu_id'];   
        $retorno['dados_usuario']['usu_id'] = $dados_array ['usu_id'];   
        $retorno['session_upr_id']  = ($dados_array ['upr_id'] == '') ? '0' : $dados_array ['upr_id'];
        log_acesso_md5();
        modal_retorno();
        
			} else {
				(isset($email))?$retorno['login'] = 3: $retorno['login'] = 0;
			}
		}	
		
	}	
	$_SESSION['login'] = $retorno['login'];
}

//if($desenvolvimento_echo) echo __LINE__ .  '<pre> _SESSION ', print_r($_SESSION,true), '</pre>';

if($desenvolvimento_echo) echo __LINE__ .  '<pre> dados_array ', print_r($dados_array,true), '</pre>';

if($desenvolvimento_echo) echo __LINE__ .  '<pre> retorno ', print_r($retorno,true), '</pre>';
//////$retorno['login'] = 9;
//////$_SESSION['login'] = $retorno['login'];
echo json_encode($retorno);

function modal_retorno(){
  global $desenvolvimento_echo, $numero_dias_promocao, $dados_array, $retorno;
  /////////////////RETORNOS acao, plano, passo, painel_modal //////////
  ////////usu_id, usu_email, udp_primeiro_acesso, udp_permissao_pro_id, udp_usu_pro_id, udp_usu_senha, udp_usu_senha_alternativa, usu_email_validado, udp_info_inicial, udp_data_acesso_inicial, udp_usu_tipo, upr_id
  //////$acao == 'info' && plano == 'ajustes' && item_dados_login.session_upr_id == 0:
  //////$$dados_array['udp_usu_tipo'] => 0 = padrão; 1= física; 2=jurídica; 3=física=mesma-area; 4=física=outra-area; 5=juridica-mesma-area; 6=juridica-outra-area;
  
//  $dados_array['udp_usu_tipo'] = 5;
//  $dados_array['upr_id'] = 0;
//  $dados_array['udp_primeiro_acesso'] = 124;
  
  
  
  $resto = $dados_array['udp_primeiro_acesso'] % 4;
  $dados_array['resto'] = $resto;
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  resto  = ' . $resto . '<br>';
  
  switch (true){
      //// acao = 'info'; plano = 'ajustes' passo = '0'
      //panel_retorno_promo, panel_retorno_ajustes, panel_retorno_base
    case $retorno['login'] == 1;
      /////FORMULARIO DE AJUSTES TIPO DE CPF, CNPJ
      if($dados_array['udp_usu_tipo'] == 0){
        $retorno['acao_modal']['acao']          = 'info';
        $retorno['acao_modal']['plano']         = 'ajustes';
        $retorno['acao_modal']['passo']         = '0';
        $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_ajustes'; 

      } else if($dados_array['udp_usu_tipo'] != 1 && $dados_array['udp_usu_tipo'] != 3 && $dados_array['upr_id'] == 0) {
        $retorno['acao_modal']['acao']          = 'info';
        $retorno['acao_modal']['plano']         = 'base';
        $retorno['acao_modal']['passo']         = '0';
        $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_base';

        ////PERIODOS DE PROMOÇÃO - ACESSO PROGISSIONAL///
        if($dados_array['upr_id'] == 0 && $resto == 0){
          $retorno['acao_modal']['acao']          = 'info';
          $retorno['acao_modal']['plano']         = 'cadastro';
          $retorno['acao_modal']['passo']         = '0';
          $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_cad_prof';
        }

        if(($dados_array['upr_id'] == 0 && ($dados_array['udp_primeiro_acesso'] < 4) || promocao_ativa_dias($numero_dias_promocao))){
          $retorno['acao_modal']['passo'] = '0';
          $retorno['acao_modal']['plano'] = 'promocao';
        }
      } else {
        /////ACESSO PESSOA FISICA
        $retorno['acao_modal']['acao']          = 'info';
        $retorno['acao_modal']['plano']         = 'base';
        $retorno['acao_modal']['passo']         = '0';
        $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_base'; 
      }      
      break;
    case $retorno['login'] == 1 && ($dados_array['udp_usu_tipo'] == 0 || $dados_array['upr_id'] == 0);
      $retorno['acao_modal']['acao']          = 'info';
      $retorno['acao_modal']['plano']         = 'ajustes';
      $retorno['acao_modal']['passo']         = '0';
      $retorno['acao_modal']['panel_retorno'] = 'panel_retorno_ajustes';    
      break;
  //  default:
  }
  $_SESSION['acao_modal'] = $retorno['acao_modal'];
}

function promocao_ativa_dias($dias){
  global $desenvolvimento_echo, $datetime_INICIO_PROMOCAO, $datetime_now;
  $tt_dias = $datetime_INICIO_PROMOCAO->diff($datetime_now);
  $tt_dias = $tt_dias->format('%a');
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  tt_dias  = ' . $tt_dias . '<br><br>';
  if($tt_dias <= $dias && $datetime_INICIO_PROMOCAO < $datetime_now){
    return true;
  } else {
    return false;
  }
}

function log_acesso_md5(){
	global $conexao, $desenvolvimento_echo, $dados_array, $produto_id, $retorno, $datetime_now_str;

  /////////APIS DE ACESSO REMOTO ////////
	$log_txt = 'I@per' . trim($dados_array['usu_email']) . $datetime_now_str;
	$log_md5 = md5($log_txt);
	$usu_id = $dados_array['usu_id'];
  
  /////////LOGS DE PRIMEIRO ACESSO ////////
  $udp_primeiro_acesso        = $dados_array['udp_primeiro_acesso'] + 1;	
  $retorno['udp_primeiro_acesso']   = $udp_primeiro_acesso; 
  $retorno['produto_id']            = $produto_id;
  $_SESSION['udp_primeiro_acesso']  = $udp_primeiro_acesso;
  $_SESSION['session_id']           = $dados_array['usu_id'];
  $_SESSION['dados_usuario']['usu_id'] = $dados_array ['usu_id'];   
  $_SESSION['session_info_inicial'] = $dados_array['udp_info_inicial'];
  $_SESSION['produtos'][0]          = $produto_id;
  $_SESSION['produto_id']           = $produto_id;
  $_SESSION['session_upr_id']  = ($dados_array ['upr_id'] == '') ? '0' : $dados_array ['upr_id'];
	
	$sql_update_log = "UPDATE iaper_db.usuarios_dados_pessoais
            SET
              udp_primeiro_acesso =  '" . $udp_primeiro_acesso . "',
              udp_data_ultimo_acesso = '$datetime_now_str',
              udp_log_acesso = '$log_md5',
              udp_data_acesso_inicial = IF(udp_data_acesso_inicial = '0000-00-00 00:00:00', NOW(), '" . $dados_array['udp_data_acesso_inicial'] . "')
              
            WHERE udp_usuario_id = '" . $dados_array['usu_id'] . "' AND udp_usu_pro_id = '" . $produto_id . "'
            ";	
    //if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  sql_update_log  = ' . $sql_update_log . '<br><br>';
    
	if($conexao->query($sql_update_log)){
		$dados_usuario[ 'log_acesso' ] = $log_md5;
    $_SESSION['session_log_acesso'] = $log_md5;
    $_SESSION['logado'] = 'sucesso';
    
		return true;
	} else {
		return false;
	}	
}


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