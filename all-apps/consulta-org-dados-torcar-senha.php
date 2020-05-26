<?
include_once("../connections/define.php");
$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
mysqli_set_charset($conexao, "utf8");
include_once("../include/functions.php");
//verificaLogin();
//echo '<pre>_POST 	2 = ' . print_r($_POST,true);

if($desenvolvimento_frd){
	$usu_email = 'hsfradinho@gmail.com';
  $usu_code  = 'A27BfBAW37WBch0BA7k3fB7hA';
}

$where = '';
$item_dados_db = $item_dados_db['dados_usuario'] = array();
$item_dados_db['retorno'] = 'erro';

if(isset($usu_code) && isset($usu_email)){
	$where = "usu_email = '" . addslashes($usu_email) . "' AND udp_usu_pro_id = '" . $produto_id . "'";

  $sql = "SELECT
          usu_nome, usu_sobrenome, udp_usu_senha, udp_usu_senha_alternativa, usu_email, udp_code, udp_code_date_in
          FROM iaper_db.usuarios
          INNER JOIN iaper_db.usuarios_dados_pessoais on usu_id = udp_usuario_id
          WHERE
            $where
          ";
  //if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  sql  = ' . $sql . '<br><br>';

    if($desenvolvimento_echo) echo '<br>' . __LINE__ .  '<pre> dados ', print_r($dados,true), '</pre>';

  if($dados = $conexao->query($sql)->fetch_assoc()){
    //if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  udp_code_date_in = ' . $dados['udp_code_date_in'] . '<br><br>';
    $dtz = new DateTimeZone("America/Sao_Paulo"); //Your timezone
    $datetime_agora   = new DateTime(date("Y-m-d H:i:s"), $dtz);
    $datetime_date_in = new DateTime($dados['udp_code_date_in'], $dtz);
    if($datetime_agora > $datetime_date_in)$tt_dias = $datetime_date_in->diff($datetime_agora);
    $tt_dias = $tt_dias->format('%a');
    if($desenvolvimento_echo) echo '<br>LINHA: ' . __LINE__ . '  tt_dias = ' . $tt_dias . '<br><br>';

    $item_dados_db['retorno'] = '1'; //USUÁRIO EXISTE
    $item_dados_db['dados_usuario']['usu_nome']       = $dados['usu_nome'];
    $item_dados_db['dados_usuario']['usu_sobrenome']  = $dados['usu_sobrenome'];
    $item_dados_db['dados_usuario']['usu_email']      = $dados['usu_email'];
    $item_dados_db['dados_usuario']['udp_code']       = $dados['udp_code'];
    $item_dados_db['dados_usuario']['udp_code_date_in'] = $dados['udp_code_date_in'];
    
    if($dados['udp_code'] != 0 || $dados['udp_code'] != '1964'){
      if($usu_code == $dados['udp_code'] && $tt_dias < 2){
        $item_dados_db['retorno'] = 'sucesso'; // code ok!    
      } else {
        $item_dados_db['retorno'] = 'erro_code';//Existe uma solicitação mas está vencida
      }    
    } else {
      $item_dados_db['retorno'] = 'erro_alterada';//Não há solicitação de senha pendente
    }
  } else {
    $item_dados_db['retorno'] = 'erro_email';//Não há solicitação de senha pendente
  }
}

//// $item_dados_db['retorno'] = 'erro';
echo json_encode($item_dados_db);
?>