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

//$sql = $conexao->query("
//			SELECT nome, usuario_id
//			FROM dados_obs
//			WHERE 
//				usuario_id = '$session_id'
//			ORDER BY usuario_id
//			");
//
////$dados = $sql->fetch_assoc();
////$item_dados_db['SELECT'] = $dados;
//
//while($dados = $sql->fetch_assoc()){
//	//array_push($item_dados_db,$dados);
//	$item_dados_db['dados_pessoais'] = $dados;
//}

//echo '<pre>', print_r($item_dados_db,true), '</pre>';
//echo $dados . '<br>';


$email = $email_errado = 'hsfradinho# @gmail.com';
//echo addslashes($email) .'<br>';



//$email = validate_email($email, $email_errado);
//if($email_errado == $email)$email_errado = '';
//echo $email . ' / ' . $email_errado .'<br>';

function validate_email($email, $email_errado){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_errado = $email;
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	}
	$email = preg_replace("/[\/\$&#*\$]/", "", $email);
	$email = str_replace('.@', '@', $email);
	return $email;
}

//$subject = 'Prova 10';
//$msg = 'teste';
//
//$email = 'hsfradinho@gmail.com';
//		
//	$mail 					= new PHPMailer();
//	$mail->IsSMTP(); 
//	$mail->SMTPDebug= 1;
//	$mail->Port 		= 587;
//	$mail->SMTPAuth = true;
//	$mail->From     = "contato@aplicativoprova10.com.br";  
//	$mail->Username = "contato@aplicativoprova10.com.br";
//	$mail->FromName = 'CADASTRO PROVA 10';
//	$mail->Password = 'Conta@123456';
//	$mail->Host     = "smtp.aplicativoprova10.com.br";
//	$mail->Mailer   = "smtp";
//	$mail->Subject  = $subject;
//	$mail->Body     = $msg;
//	$mail->AltBody  = $msg;
//	$mail->AddAddress( addslashes($email));
//	$mail->CharSet = 'UTF-8';
//	//$mail->Send();


//$sql_info = $conexao->query("SELECT sem_id FROM acd_semanario_temp WHERE sem_usu_id = '$session_id'");
//		$dados = $sql_info->fetch_assoc();
//		$sem_id = $dados['sem_id'];

//if($dados == ''){
//	$sql =	"INSERT INTO acd_semanario_temp 
//				(sem_usu_id, sem_seg, sem_ter, sem_qua, sem_qui, sem_sex, sem_sab, sem_dom) 
//	VALUES ('$session_id', '$seg', '$ter', '$qua', '$qui', '$sex', '$sab', '$dom')";
//	$conexao->query($sql);
//} else {			
//	$sql_up =	"UPDATE 
//			acd_semanario_temp
//			SET 
//				sem_seg 		= '".$seg."',  
//				sem_ter 		= '".$ter."',  
//				sem_qua 		= '".$qua."',  
//				sem_qui 		= '".$qui."',  
//				sem_sex 		= '".$sex."',  
//				sem_sab 		= '".$sab."',  
//				sem_dom 		= '".$dom."', 
//		WHERE
//				sem_id 	= '".$sem_id."'"; 
//	$conexao->query($sql_up);
//}
		
		
/*
////$dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
////$datetime_inter = new DateTime(date("Y-m-d"), $dtz);
////if($datetime_fim > $datetime_inter)$tt_dias = $datetime_ini->diff($datetime_fim);
////$tt_dias = $tt_dias->format('%a');

$email = 'hsfradinho @gmail.com';
$email = str_replace(' ', '', $email);
echo '|' . $email . '|';

$usu_ces_tipo			= 'CURSO';


$op_id = 1;
$dados_user_op = $conexao->query(" 
						SELECT gaming, acd_dge_des_id
						FROM acd_dge_desafio
						LEFT JOIN usuarios_dados_pessoais ON usuario_id = '".$op_id."'
						WHERE acd_dge_d_1 = '".$op_id."' OR acd_dge_d_2 = '".$op_id."'
						ORDER BY acd_dge_des_id DESC
						LIMIT 1
						");					
$dados_user_op = $dados_user_op->fetch_assoc();	
//echo '<pre>dados_user_op = ' . print_r($dados_user_op,true), '</pre>';

$item_dados_db = $dados = $item_dados_db['SELECT'] = array();
$item_dados_db['POST'] = $_POST['session_id'];
$item_dados_db['GET'] = $_GET['session_id'];
$session_id = $_GET['session_id'];

/////// UPDATE ////////////

$sql = $conexao->query("
					UPDATE $tabela 
					SET $campo = '$valor'
					WHERE 
					$user = '".$usuario_id."'
					");
///////////////////////////*/

///////FUNÇÃO PARA TRATAMENTO RECURSIVO DE ARRAY UTF8//////
//array_walk_recursive($retorno, 'encode_items');
////echo '<pre>', print_r($retorno,true);
//echo json_encode($retorno);
//
//function encode_items(&$item, $key){
//    $item = utf8_encode($item);
//}

echo json_encode($item_dados_db);
?>