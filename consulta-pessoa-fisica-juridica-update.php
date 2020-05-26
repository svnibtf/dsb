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

if(isset($_SESSION['session_id']) && $_SESSION['session_id'] == $usu_id){
  $session_id = $_SESSION['session_id'];  
  
  $sql_up =	"UPDATE iaper_db.usuarios_dados_pessoais
      SET 
        udp_usu_tipo 		= '".$tp."'
      WHERE
        udp_usuario_id 	= '".$usu_id."' AND udp_usu_pro_id = '".$produto_id."' "; 
  
  if(1==1 && $conexao->query($sql_up)){
    $_SESSION['session_usu_tipo'] = $tp;
    $item_dados_db['cadastrado'] = 'sucesso';
  } else {
    $item_dados_db['cadastrado'] = 'erro';
  }  
} else {
  $item_dados_db['cadastrado'] = 'erro';
}

if($desenvolvimento_interno) echo '<br><br>RETORNO JSON<br>';
//$item_dados_db['cadastrado'] = 'sucesso';
echo json_encode($item_dados_db);

///////FUNÇÃO PARA TRATAMENTO RECURSIVO DE ARRAY UTF8//////
//array_walk_recursive($retorno, 'encode_items');
////echo '<pre>', print_r($retorno,true);
//echo json_encode($retorno);
//
//function encode_items(&$item, $key){
//    $item = utf8_encode($item);
//}

?>