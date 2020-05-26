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
	$session_id = 1;
}

$item_dados_db = array();

$sql = "SELECT nome, email
				FROM usuarios
				WHERE 
					id = '$session_id'
				ORDER BY id
				";

//if($desenvolvimento_interno) echo '<br>LINHA: ' . __LINE__ . '  sql  = ' . $sql . '<br><br>';

$sql_con = $conexao->query("$sql");
while($dados = $sql_con -> fetch_assoc()){
	//array_push($item_dados_db,$dados);
	$item_dados_db['dados_pessoais'] = $dados;
}

//if($desenvolvimento_interno) echo __LINE__ .  '<pre> item_dados_db ';

function verificarLink($url, $limite = 25){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);        // Inicia uma nova sessão do cURL
    curl_setopt($curl, CURLOPT_TIMEOUT, $limite); // Define um tempo limite da requisição
    curl_setopt($curl, CURLOPT_NOBODY, true);     // Define que iremos realizar uma requisição "HEAD"
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, false); // Não exibir a saída no navegador
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // Não verificar o certificado do site

    curl_exec($curl);  // Executa a sessão do cURL
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200; // Se a resposta for OK, a URL está ativa
    curl_close($curl); // Fecha a sessão do cURL

    return $status;
}

$link = "http://mgturismo.com.br/newsdino/?title=constelacoes-familiares-e-direito-sistemico-sao-temas-de-congresso-em-sp&partnerid=1596&releaseid=165758";

$link = "https://www.youtube.com/watch?v=HVEknahCR0E";

$status = verificarLink($link);
if ($status) {
   if($desenvolvimento_interno) echo __LINE__ .  " yt O link fornecido está disponível!";
} else {
   if($desenvolvimento_interno) echo __LINE__ .  " yt O link fornecido está quebrado.";
}

if($desenvolvimento_interno) echo '<br><br>RETORNO JSON<br>';
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