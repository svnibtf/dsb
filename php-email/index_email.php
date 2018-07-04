<? 
include('../connections/accbr_locaweb.php');
include ("../includes/functions.php");
ChromePhp::log($_SESSION);
?>
<html>

<head>
<title>email</title>
</head>

<body>
	<form name="form_email" id="email_app_acc" action="email_app_acc.php" method="post">
        <input 	type="hidden" name="nome_send" id="nome_send" 
                value="Hamilton Silva">    	
        </input>
        <input 	type="hidden" name="email_send" id="email_send"
                value="hsfradinho@gmail.com">
        </input>
        <input 	type="hidden" name="mensagem" id="mensagem"
                value="Olá">
        </input>
        <input type="submit" name="enviar" id="btn_enviar">
    </form>

<body> 
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
    <h3>Caro <strong>(nome)</strong>.</h3> 
    <p>O <strong>(nome)</strong> inscreveu você como <strong>USUÁRIO LIFE NA (id)</strong>.</p> 
    <p>Agora você  pode acessar e utilizar as ferramentas disponíveis conforme seu nível de acesso e desenvolvimento nessas. No caso a <strong>RODA DAS SAÚDES</strong>.</p>
    <p>Para acessar siga os passos abaixo e as orientações posteriores no portal:</p>
    <p><strong>1</strong>. Acesse o endereço eletrônico (endereço) (link). (preferencialmente Navegador Google Chrome <img width="15px" src="../images/icones/Google_Chrome_icon.png">&nbsp;);</p>
    <p><strong>2. Login:</strong> (email);</p>
    <p><strong>3. Senha:</strong> (senha) – essa é sua senha provisória.<br></p>
    
    <h3>Obrigado por fazer parte da (marca)</h3>
    <div style="background-color:#ffffff; margin:20px 0 40px 0; padding-left:10px; padding-top:5px; font-family:Arial, Helvetica, sans-serif; font-size:12px;">
    <table style="margin-left:6px" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="middle">
          <div align="left"><a href="http://bit.ly/MGjob" target="_blank">
          <img style="display:block" src="http://img.twisters.com.br/icon-sing/2014/logo.png" alt="Visite o nosso site" border="0"/></a>
          </div>
          </td>
          <td align="left" valign="middle" style="padding-left:5px">
          <table style="margin-left:10px" border="0" cellspacing="2">
            <tr>
              <td width="10" rowspan="5" style=" border-left: solid 2px #c1d961;"></td>
              <td><span style="DISPLAY: block; FONT-SIZE: 14px; COLOR: #333; FONT-FAMILY: tahoma; font-weight:bold">marcelo graciolli</span></td>
            </tr>
            <tr>
              <td><span style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY: arial; ">Internet & Marketing Consultant</span></td>
            </tr>
            <tr>
              <td><A href="mailto:nome@suaempresa.com" target="_blank" class=headline style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY:arial;">nome@suaempresa.com</A></td>
            </tr>
            <tr>
              <td><A href="http://bit.ly/MGjob" target="_blank" class=headline style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY:arial;">www.graciolli.com</A></td>
              </tr>
            <tr>
              <td><span style="DISPLAY: block; FONT-SIZE: 11px; COLOR: #333; FONT-FAMILY: arial; ">Fone: (11) 2255-0020</span></td>
            </tr>
          </table></td>
          <td align="left" valign="bottom" style="padding-left:5px">&nbsp;</td>
        </tr>
      </table>
      <br>
    </div>
Caso haja algum engano acesse (endereço) e notifique um gestor.
</div>
</body>     

<script>

</script>   
    
</html>