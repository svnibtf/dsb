<?php
include_once("connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once( "connections/define-iaper.php" );
$conexao_iaper  = new mysqli(DB_HOST_IAPER, DB_LOGIN_IAPER, DB_SENHA_IAPER, DB_NAME_IAPER);
mysqli_set_charset($conexao_iaper, "utf8");
include_once("include/functions.php");
//include_once("php-email/phpmailer/class.phpmailer.php");
//verificaLogin();

$desenvolvimento = false;
if($desenvolvimento_frd){
  $email = 'hsfradinho@gmail.com';
  $nome = 'Frade';
  $sobrenome = 'Frade';
  $senha = '123456';

  $origem = 'DSB';
  $pla_id = '10';
  $produto_id = '101';
	
	$id = '179223';
	$pid = '6296452';
	$list_id = '179223';
	$provider = 'leadlovers';
	$udp_pais = 'BRA';
	$udp_telefone_celular_2 = '5512988456886';
	$name = 'Rodger';
	$sobrenome = 'Oliver';
	$ddi = '55';
	$phone = '(12)+98845-6886';
	$udp_estado = 'SP';
	$udp_municipio = 'Trememb%C3%A9';
	$email = 'timeline.mb%40gmail.com';
	$senha = '123456';
	$senha_confirma = '123456';
}





//if($desenvolvimento_echo) echo __LINE__ .  '<pre> _POST ', print_r($_POST,true), '</pre>';

if(isset($_SESSION['session_id'])){
	$session_id = $_SESSION['session_id'];
}

$retorno['cadastrado'] = 'erro';
if(isset($email)){
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  email  = ' . $email . '<br>';
  
  if(isset($name)){$nome=$name;}else{$nome = '';}
  //$retorno ['retorno']['dados_enviados'] = $nome . ' - ' . $sobrenome . ' - ' . $email . ' - ' . 
	$senha = trim($senha) . 'I@per';
	$senha_md5 = md5($senha);
  if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  senha_md5  = ' . $senha_md5 . '<br>';
	$permissao_id = 10;
	$responsavel 	= 0;
	if(!isset($sobrenome) || $sobrenome == '0'){
		$sobrenome = '';
		$pos1 	= stripos($nome, ' ');
		if($pos1 > 1){
			$sobrenome = substr($nome,$pos1+1);
			$nome 	= substr($nome,0, $pos1);
		}
	}
	
	$item_dados_db = array();
	$senha_md5 = md5($senha);	
	$sql = $conexao_iaper->query(" 
			SELECT usu_id
			FROM usuarios
			WHERE usu_email = '$email'");
	
	$row_cnt = mysqli_num_rows($sql);
	//if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  row_cnt  = ' . $row_cnt . '<br>';
  
  
	if($row_cnt > 0){//>0
    $retorno['cadastro'] = 'email_ja_cadastrado';
	} else {
//		$sql_insert_usu = "INSERT INTO usuarios
//										(nome, sobrenome, email, senha, permissao_id, responsavel)
//										VALUES ('$nome', '$sobrenome', '$email', '$senha_md5', '$permissao_id', '$responsavel')";
//		$conexao->query($sql_insert_usu);
//		$retorno['cadastro'] = 'sucesso';	
    
    if (isset($nome) && $nome!="" && isset($sobrenome) && $sobrenome != ""){
      
		$sql_in_usu = "INSERT INTO usuarios (usu_nome, usu_sobrenome, usu_email, usu_email_validado) 
									VALUES('$nome', '$sobrenome', '$email', '0')";

		if(!$desenvolvimento && $conexao_iaper->query($sql_in_usu)){
      if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  RETORNO INSERT USUÁRIO <br>';
			$retorno['cadastrado'] = '2';
			$usu_id = $conexao_iaper->insert_id;			

			$_SESSION['usu_id'] = $usu_id;		

			$sql_in_udp = "INSERT INTO usuarios_dados_pessoais (udp_usuario_id, udp_usu_pro_id, udp_usu_senha_alternativa, udp_pais, udp_estado, udp_municipio, udp_telefone_celular_2) 
								VALUES('$usu_id', '$produto_id', '$senha_md5', '$udp_pais', '$udp_estado', '$udp_municipio', '$udp_telefone_celular_2')";
			
      if(!$desenvolvimento && $conexao_iaper->query($sql_in_udp)){
        if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  RETORNO INSERT DADOS PESSOAIS USUÁRIO <br>';
				$retorno['cadastrado'] = '3';	
					$rel_ucp_validade = $pla_tempo; ////define-iaper.php
					$rel_ucp_origem = $origem; ////define-iaper.php
				$sql_in_rel = "INSERT INTO adm_rel_prodplan_usu (rel_ucp_usu_id, rel_ucp_pro_id, rel_ucp_pla_id, rel_ucp_origem, rel_ucp_validade) 
								VALUES('$usu_id', '$produto_id','$pla_id', '$rel_ucp_origem', '$rel_ucp_validade')";
				if(!$desenvolvimento && $conexao_iaper->query($sql_in_rel)){
          if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  RETORNO REL PLANO <br>';
					$retorno['cadastrado'] = 'sucesso';
				}	else {
					$retorno['cadastrado'] = '4';
				}			
			}
		}
		}else {
				$retorno ['retorno']['dados'] = 'Dados incorretos Nome e Sobrenome';
				$retorno ['retorno']['email'] = 'erro_email_cadastrado';
		}
	}
}

if($desenvolvimento_echo) echo '<br><br><br>';
echo json_encode($retorno);
?>