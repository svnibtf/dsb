<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php-email/PHPMailer/src/Exception.php';
require '../php-email/PHPMailer/src/PHPMailer.php';
require '../php-email/PHPMailer/src/SMTP.php';

error_reporting(-1); 
if($desenvolvimento_frd){
	$email = 'hsfradinho@gmail.com';
}

$retorno['troca'] = 0;
$chars = array( "A" , "f" , "k" , "i" , "B" , "U" , "n" , "2" , "3" , "7" , "h" , "0" , "W" , "c" , "1" );
$code = "";
for($x=0;$x<25;$x++)
		$code .= $chars[rand()%14];
//echo 'code = '. $code . '<br>';

$sql = "SELECT id, nome, sobrenome 
				FROM usuarios 
				WHERE email = '" . addslashes($email) . "'";
								
$dados = $conexao->query($sql);
	if($dados->num_rows > 0) {	            
			$row = $dados->fetch_array();
			(isset($row["sobrenome"]))?$sobrenome = $row["sobrenome"]:$sobrenome = '';
			$msg = "Olá, " . $row["nome"] .' '. $row["sobrenome"] .". <br> Você reportou que esqueceu sua senha do MAPA DO DIREITO SISTÊMICO NO BRASIL?<br> Então clique no link abaixo em no máximo 48 horas e redefina a sua senha.<br><br>
	Link = http://direitosistemicobrasil.com.br/all-apps/page-org-config-dados-pessoais.html?code=".$code."&email=".$email."<br><br><strong>Caso não consiga acessar o link, copie e cole na barra de endereços do navegador.</strong><br><br>Ao acessar o MAPA esse link perderá sua função!<br><br>Caso não tenha solicitado, desconsidere essa mensagem.<br><br><br> Equipe Gestora do Mapa do Direito Sistêmico no Brasil";
//		echo $msg;	
		$mail 					= new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug= 2;
		$mail->Debugoutput = 0;
		$mail->Port 		= 587;
		$mail->SMTPAuth = true;
		$mail->From     = "acao@direitosistemicobrasil.com.br";
		$mail->Username = "acao@direitosistemicobrasil.com.br";
		$mail->FromName = 'MAPA DIREITO SISTÊMICO NO BRASIL';
		$mail->Password = 'Acao@123456';
		$mail->Host     = "smtp.direitosistemicobrasil.com.br";
		$mail->Mailer   = "smtp";
		$mail->Subject  = "Solicitação de senha: não responda";
		$mail->Body     = $msg;
		$mail->AltBody  = $msg;
		$mail->AddAddress( addslashes($email) );
		$mail->CharSet = 'UTF-8';
		//1==1
		if($mail->Send()) {
			$sql = "UPDATE usuarios SET code = '".$code."' WHERE email = '" . $email . "'";
			if($conexao->query($sql)){$retorno['troca'] = 1;}
		} else {
			$retorno['email_erro'] = 2;
			$retorno['email_erro_msg']= 'Insira um email válido! Erro: ' . $mail->ErrorInfo;
		}
	} else {
		$retorno['troca']=-1;
	}
	echo json_encode($retorno);
?>
		    