<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

$query_udp_code = "AND udp_code = '{$udp_code}'";
if($origem == 'local') {
	$usu_email = $_SESSION['session_email'];
	$query_udp_code = "";
}

$desenvolvimento = false;

if($desenvolvimento_frd){
	$usu_email = 'hsfradinho@gmail.com';
	$udp_code  = 'A27BfBAW37WBch0BA7k3fB7hA';
	$nova_senha = '123456';
}

$item_dados_db = array();
$retorno['cadastro'] = 'erro';
$retorno['dados recebidos'] = $_POST;
	

if (isset($nova_senha) && $nova_senha != '' && (isset($udp_code) || $origem == 'local') && isset($usu_email)){
	$senha_new = trim($nova_senha) . 'I@per';
	$senha_new = md5($senha_new);
	$senha_check = md5('000000I@per');
	
  $sql_sel = "SELECT usu_id, usu_nome, usu_sobrenome, udp_usuario_id, udp_usu_senha, udp_usu_senha_alternativa, udp_usu_pro_id
				FROM  iaper_db.usuarios 
        INNER JOIN iaper_db.usuarios_dados_pessoais on usu_id = udp_usuario_id
				WHERE 
          usu_email = '" . addslashes($usu_email) . "' AND udp_usu_pro_id = '" . $produto_id . "' {$query_udp_code} ;";

  if($dados = $conexao->query($sql_sel)->fetch_assoc()){
  if($desenvolvimento_echo) echo '<br>' . __LINE__ .  '<pre> dados ', print_r($dados,true), '</pre>';
  }	
  $retorno['dados'] = $dados;
	
	if(!$desenvolvimento){
  $udp_usuario_id = $dados['udp_usuario_id'];
  $udp_usu_senha_alternativa = $dados['udp_usu_senha_alternativa'];
  $udp_usu_senha = $dados['udp_usu_senha']; 
	$sql = "UPDATE iaper_db.usuarios_dados_pessoais 
					SET
          udp_usu_senha = CASE WHEN udp_usu_senha  =  '" . $udp_usu_senha_alternativa . "' THEN '" . $senha_new . "' ELSE '" . $udp_usu_senha . "' END,
						udp_usu_senha_alternativa = '" . $senha_new . "',
						udp_code = '1964' 
					WHERE 
						udp_usuario_id = '" . $udp_usuario_id . "' AND udp_usu_pro_id = '" . $produto_id . "' {$query_udp_code} ;";
            
	if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  sql  = ' . $sql . '<br><br>';
		if($conexao->query($sql)){
			$retorno['cadastro'] = 'sucesso';
		}
	}
}

echo json_encode($retorno);
//89794b621a313bb59eed0d9f0f4e8205
