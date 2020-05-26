<?php
include_once( "connections/define-iaper.php" );
$conexao_iaper  = new mysqli(DB_HOST_IAPER, DB_LOGIN_IAPER, DB_SENHA_IAPER, DB_NAME_IAPER);
mysqli_set_charset($conexao_iaper, "utf8");
//session_unset();
// INSERE AUTOMATICAMENTE OS CAMPOS POST E GET
// KEY = VALOR
include_once("include/functions.php");

$sql = "SELECT pais_cod, pais_cod_3, pais_nome, pais_cod_area
        FROM ibge_pais";

$sql_con = $conexao_iaper->query($sql) or erro_frd($conexao_iaper, __LINE__);
while($dados = $sql_con->fetch_assoc()){
    $item_dados_db['paises'][$dados['pais_cod_3']] = [$dados['pais_nome'], $dados['pais_cod_area']];
}

//if($desenvolvimento_echo) echo __LINE__ .  '<pre> item_dados_db ', print_r($item_dados_db,true), '</pre>';

echo json_encode($item_dados_db);
?>