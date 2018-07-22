<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

$item_dados_db = array();
$retorno['cadastro'] = 'erro';
if($desenvolvimento_frd){
	$email = 'hsfradinho@gmail.com';
	$code='0';
	$senha = '123456';
}

if (isset($senha) && $senha != ''){
	$senha_new = trim($senha);
	$senha_new = md5($senha_new);
	if(isset($_SESSION['session_id'])){
		$session_id = $_SESSION['session_id']; 
		$where = "id = '$session_id'";
	}
	
	if(isset($code) && isset($email)){
		$where = "email = '$email' AND email = '$email'";
	}
	
	if(isset($code) && isset($email)){	
		$sql_sel = $conexao->query("SELECT id, code
								FROM usuarios 
								WHERE 
									email = '$email'");
		
		if($dados = $sql_sel->fetch_assoc()){
			if($code == $dados['code']){
				$session_id = $dados['id'];
				//echo ' code =  ' . $dados['code'];
			} else {
				if(!isset($_SESSION['session_id'])){
					$retorno['cadastro'] = 'erro_code';
					if($dados['code'] == 0){
						$retorno['cadastro'] = 'erro_alterada';
					}
				}
				//echo ' code =  ' . $dados['code'];
			}
		}	
	}
	
	if(isset($session_id)){
	$sql = "UPDATE usuarios 
					SET 
						senha = '".$senha_new."',
						code = '0' 
					WHERE 
						id = '$session_id'";
	//echo ' sql ' . $sql;
		if($conexao->query($sql)){
			$retorno['cadastro'] = 'sucesso';
		}
	}
}

echo json_encode($retorno);
//89794b621a313bb59eed0d9f0f4e8205