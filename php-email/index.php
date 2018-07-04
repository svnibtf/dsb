<? 
include('../connections/accbr_locaweb.php');
include ("../includes/functions.php");
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
</body>     

<script>

</script>   
    
</html>