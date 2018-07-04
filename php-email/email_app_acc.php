<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>

<?php
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
include("PHPMailer-master/class.phpmailer.php");



// NOME E EMAIL PARA ENVIO
	(isset($_POST['nome_send']))?$nome_send   	= $_POST['nome_send']		:$nome_send 		= 'Membro ACC' ;
	(isset($_POST['email_send']))?$email_send	= $_POST['email_send']		:$email_send 			= 'hsfradinho@gmail.com';
	
//SENHA DO CADASTRO
	(isset($_POST['senha_cadastro']))?$senha_cadastro	= ucwords($_POST['senha_cadastro'])	:$senha_cadastro 	= '123mudar';

//NOME E EMAIL DE QUEM ESTÁ ENVIANDO
	(isset($_POST['nome_from']))?$nome_from    			= ucwords($_POST['nome_from'])	:$nome_from 	= 'ACC - Administrador Sistema ';
	(isset($_POST['email_from']))?$email_from   		= $_POST['email_from']			:$email_from 		= 'acc_comunicacao@accbr.com.br';

//NOME E EMAIL PARA RESPOSTA
	(isset($_POST['nome_resposta']))?$nome_resposta	= $_POST['nome_resposta']		:$nome_resposta 			= 'ACC - Sistema';
	(isset($_POST['email_resposta']))?$email_resposta	= $_POST['email_resposta']		:$email_resposta 			= 'naoresponder@accbr.com.br';
	
// ASSUNTO E DADOS DA MENSAGEM
	(isset($_POST['mensagem']))?$mensagem   			= $_POST['mensagem']			:$mensagem 		= 'ERRO AÇÃO';
	(isset($_POST['assunto']))?$assunto   				= $_POST['mensagem']			:$assunto 		= '	ERRO DO EMAIL';

/*if($usuario_genero 				== 1){
	$prefixo_usuario 		= 'O';
} else if($usuario_genero 	== 2){
	$prefixo_usuario 		= 'A';
} else if($usuario_genero 	== 0){
	$prefixo_usuario 		= 'O(A) Usuário(a)';
}*/

// mensagem
	$msg  = "";
	$msg .='
<style type="text/css">
	TD {margin: 0px;padding: 0px;}
	IMG {margin: 0px;padding: 0px;}
	A.headline {TEXT-DECORATION: none;margin:;}
	A.headline:link {TEXT-DECORATION: none;}
	A.headline:visited {TEXT-DECORATION: none}
	A.headline:hover {TEXT-DECORATION: underline;}
	A: {margin: 0px;padding: 0px;}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="format-detection" content="telephone=no">
    <div> 
    <h3>Caro <strong>'. $nome_send .'</strong>.</h3> 
    <p>FULANO DE TAL inscreveu como <strong> USUÁRIO LIFE na </strong>.</p> 
    <p>Agora você  pode acessar e utilizar as ferramentas disponíveis conforme seu nível de acesso e desenvolvimento pessoal. No caso a <strong>RODA DAS SAÚDES</strong>.</p>
    <p>Para acessar siga os passos abaixo e as orientações posteriores no portal:</p>
    <p><strong>1</strong>. Acesse o endereço eletrônico <a href="#" target="_blank">Prova 10</a>. (preferencialmente Navegador Google Chrome <img width="15px" src="http://accbr.com.br/app/images/icones/Google_Chrome_icon.png">&nbsp;);</p>
    <p><strong>2. Login:</strong> ' . $email_send .';</p>
    <p><strong>3. Senha:</strong> ' . $senha_cadastro .' - essa é sua senha provisória, para segurança dos seus dados troque-a no primeiro acesso.<br></p>
    
    <h3>Obrigado por fazer parte da (marca)</h3>
    <div style="background-color:#ffffff; margin:20px 0 40px 0; padding-left:10px; padding-top:5px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
    <table style="margin-left:6px" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="middle">
          <div align="left"><a href="#" target="_blank">
          <img style="display:block" <img src="" border="0"/></a>
          </div>
          </td>
          <td align="left" valign="middle" style="padding-left:5px">
          <table style="margin-left:10px" border="0" cellspacing="2">
            <tr>
              <td width="10" rowspan="5" style=" border-left: solid 2px #c1d961;"></td>
              <td><span style="DISPLAY: block; FONT-SIZE: 14px; COLOR: #333; FONT-FAMILY: tahoma; font-weight:bold">Prova 10</span></td>
            </tr>
            <tr>
              <td><span style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY: arial; ">Prova 10</span></td>
            </tr>
            <tr>
              <td><span FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY:arial;">Prova 10</span></td>
            </tr>
            <tr>
              <td><span style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY: arial; ">Fone: Prova 10 </span></td>
            </tr>
            <tr>
              <td><span style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY: arial;">Sede: Prova 10</span></td>
              </tr>

          </table></td>
          <td align="left" valign="bottom" style="padding-left:5px">&nbsp;</td>
        </tr>
      </table>
      <br>
    </div>
Caso haja algum engano envie um email para Prova 10 e notifique um gestor.
</div>';

echo $msg;
	
//instancia a objetos
$mail = new PHPMailer();

// mandar via SMTP
$mail->IsSMTP(); 

// Seu servidor smtp
$mail->Host = "localhost";
//$mail->Host = "mail.accbr.com.br";  

// habilita smtp autenticado
$mail->Mailer   = "smtp";
$mail->SMTPAuth = true; 

// usu�rio deste servidor smtp
$mail->Username = $email_from;
//$mail->Username = "contato@accbr.com.br";
//$mail->Password = "cont@to@ccbr1827"; // senha

//email utilizado para o envio - pode ser o mesmo de username
$mail->From = $email_from;;
$mail->FromName = $nome_from;

//Enderecos que devem ser enviadas as mensagens
$mail->AddAddress($email_send,$nome_send);
//$mail->AddAddress("contato@accbr.com.br","Contato");

//wrap seta o tamanhdo do texto por linha
$mail->WordWrap = 50; 

//anexando arquivos no email
//$mail->AddAttachment("anexo/arquivo.zip"); 
//$mail->AddAttachment("../images/tumbs/cp_logo_' . $origem_cp  . '.png");
$mail->IsHTML(true); //enviar em HTML

    // informando a quem devemos responder 
	//ou seja para o mail inserido no formulario
	$mail->AddReplyTo($email_resposta,$nome_resposta);
 
$mail->Subject 	= $assunto;
//adicionando o html no corpo do email
$mail->Body 	= $msg;
$mail->AltBody  = $msg;

//enviando e retornando o status de envio
if(!$mail->Send()){
	echo "Houve um erro ao enviar o email verifique a sua conexão e tente novamente. Obrigado!<br>".$mail->ErrorInfo;
exit;
} else {
	echo "<br> Mensagem enviada com Sucesso";
}
?>
</body>
</html>
