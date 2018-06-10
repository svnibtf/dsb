<?php
	include_once("connections/define.php");
	$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
	mysqli_set_charset($conexao, "utf8");
	include_once("include/functions.php");
	
	$item_dados_db = array();
	$retorno['cadastro'] = 'erro';
	
	if(isset($_SESSION['session_id']))$usuario_id = $_SESSION['session_id'];
	if($desenvolvimento_interno){		
//////		$dbo_link 	= 'http://localhost/ds-observatorio/observatorio/page-inserir-dados.html5';
////		$tit 				= 'aaaaaa';
//////		$autor 			= '';
//		$estado 		= 'SP';		
//////		$descricao 	= 'descricao';
//		$aluno_inn 	= 'true';
////		$cidade 		= '0';
//////		$session_id	= 1;
//		$liberado = 0;
	}
//estado: 0
//tit: aaaaaa
//autor: 
//dbo_link: 
//descricao: 
//cidade: 0
//liberado: 0
//aluno_inn: false	
	//if($desenvolvimento_frd)echo '<pre> _SESSION = ', print_r($_SESSION,true), '</pre>';
	$where = '';
	//////OBRIGATORIAS///////
	$where .= "dbo_deletado = 0  AND ";
	if(!isset($liberado))$liberado = 1;
	$where .= "dbo_liberado = " . $liberado . "  AND ";
	//////OBRIGATORIAS///////
	if(isset($aluno_inn)){
		if($aluno_inn == 'true' || $aluno_inn == 1){
			$where .= "dbo_aluno_inn = 1  AND ";
		}
	}
	
	if(isset($estado) && $estado != '0')$where .= "dbo_estado = '" . $estado . "'  AND ";
	if(isset($cidade) && $cidade != 0)$where .= "dbo_cidade = '" . $cidade . "'  AND ";
	if(isset($autor) && $autor != '')$where .= "dbo_autor LIKE '%" . $autor . "%'  AND ";
	if(isset($dbo_link) && $dbo_link != '')$where .= "dbo_link LIKE '%" . $dbo_link . "%'  AND ";
	if(isset($tit) && $tit != '')$where .= "dbo_tit LIKE '%" . $tit . "%'  AND ";
	if(isset($descricao) && $descricao != '')$where .= "dbo_tit LIKE '%" . $tit . "%'  AND ";
	$where = substr($where,0,-4);
	if($desenvolvimento_frd)echo '<br> where = ' . $where;

if((isset($estado) &&  $estado != '' ) || (isset($cidade) &&  $cidade != '') || (isset($autor) &&  $autor != '' ) || (isset($dbo_link) &&  $dbo_link != '') || (isset($tit) &&  $tit != '') || isset($liberado)){
	//if($desenvolvimento_frd)echo '<pre> _POST = ', print_r($_POST['valor'],true), '</pre>';
	
	$sql = "SELECT dados_obs.*, nome, sobrenome, date_format(dbo_time_in, '%d/%m/%Y as %H:%i' ) as dbo_time_in
					FROM dados_obs
					LEFT JOIN estados ON sigla = dbo_estado
					LEFT JOIN usuarios ON id = dbo_user_id_insert
					WHERE 
						$where
					LIMIT 50 
					";
	if($desenvolvimento_frd)echo '<br> sql = ' . $sql;
	$sql_exec = $conexao->query($sql);
	while($dados = $sql_exec ->fetch_assoc()){
		$item_dados_db[] = $dados;
	}
	
	$retorno['itens'] = $_POST;
	$retorno['cadastro'] = 'sucesso';	
	$retorno['dados_estado'] = $item_dados_db;
	
	if(isset($estado)){
		$sql_estado = $conexao->query("
							SELECT estado
							FROM estados						
							WHERE
								sigla = '$estado'						 
							");
		$retorno['itens']['estado_nome'] =  0;
		$dados = $sql_estado->fetch_assoc();
		$retorno['itens']['estado_nome'] = $dados['estado'];
		}
}
	
if($desenvolvimento_frd)echo '<pre> item_dados_db  ', print_r($item_dados_db,true), '</pre>';
echo json_encode($retorno);
?>
