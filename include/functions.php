<?php
//include_once("../connections/define.php");
//$conexao = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
foreach($_POST AS $key => $value) 		{ ${$key} = mysqli_real_escape_string($conexao,$value); }
foreach($_GET AS $key => $value) 			{ ${$key} = mysqli_real_escape_string($conexao,$value); }
//$_SESSION_JS = json_encode($_SESSION);
function verificaLogin(){
	if (!isset( $_SESSION['session_id'] ) || !isset( $_SESSION['session_nome'] ) ){
		if($_SERVER["SERVER_NAME"] == 'localhost'){
		/*echo 	'<script type="text/javascript">location="index-ios-tablet-desktop.html";</script>';*/
		} else {
		/*echo '<script type="text/javascript">location="index-ios-tablet-desktop.html";</script>';
		die();*/
    }
	}
}

$desenvolvimento_echo     	= false;
$desenvolvimento_frd      	= false;
$desenvolvimento_interno  	= false;
if($_SERVER["SERVER_NAME"] != 'localhost'){
	$desenvolvimento_echo    	= false;
  $desenvolvimento_frd     	= false;
  $desenvolvimento_interno 	= false;
}