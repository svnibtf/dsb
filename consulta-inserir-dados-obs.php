<?php
	include_once("connections/define.php");
	$conexao  = new mysqli(DB_HOST, DB_LOGIN, DB_SENHA, DB_NAME);
	mysqli_set_charset($conexao, "utf8");
	include_once("include/functions.php");
	
	$item_dados_db = array();
	$retorno['cadastro'] = 'erro';
	
	$usuario_id = 1;
	if($desenvolvimento_interno){		
		//$dbo_link 	= 'http://localhost/ds-observatorio/observatorio/page-inserir-dados.html4';
//		$tit 				= 'tit';
//		$autor 			= 'autor';
//		$estado 		= 'estado';		
//		$descricao 	= 'descricao';
		//$aluno_inn 	= 'true';
//		$cidade 		= 'cidade';		
	}

if($desenvolvimento_frd)echo 'dbo_link = ' . $dbo_link;
//if(isset($usuario_id) &&  $usuario_id != '' && isset($dim_id) &&  $dim_id != '' && isset($valor) &&  $valor != ''){
if(isset($usuario_id) && $usuario_id != '' && isset($dbo_link) &&  $dbo_link != ''){
	($aluno_inn == true)?$aluno_inn = 1:$aluno_inn = 0;
	$liberado = 1;
	//if($desenvolvimento_frd)echo '<pre> _POST = ', print_r($_POST['valor'],true), '</pre>';
	$sql = $conexao->query("
					SELECT *
					FROM dados_obs
					WHERE 
						dbo_link = '$dbo_link'
						 
					");
	
	while($dados = $sql->fetch_assoc()){
		$item_dados_db['dados_link'] = $dados;
	}
	
	if($desenvolvimento_frd)echo '<pre> item_dados_db  ', print_r($item_dados_db,true), '</pre>';
	
	if($item_dados_db == [] || ($item_dados_db['dados_link']['dbo_id'] == $editando && $tipo == 'update')){
		if($tipo == 'salvar'){
		$sql_in = "INSERT INTO dados_obs
											(dbo_tit, dbo_autor, dbo_user_id_insert, dbo_estado, dbo_link, dbo_descricao, dbo_aluno_inn, dbo_cidade, dbo_liberado) 
							VALUES 	('$tit', '$autor', '$usuario_id', '$estado', '$dbo_link', '$descricao', '$aluno_inn', '$cidade', '$liberado') 
						";
		if($desenvolvimento_frd)echo '<br>INSERT';
		} else if($tipo == 'update'){ 
			$sql_in = "UPDATE dados_obs
								SET 
									dbo_tit='$tit',
									dbo_autor='$autor',
									dbo_user_id_insert='$user_id_insert',
									dbo_estado='$estado',
									dbo_link='$dbo_link',
									dbo_descricao='$descricao',
									dbo_aluno_inn='$aluno_inn',
									dbo_cidade='$cidade',
									dbo_liberado='$liberado'
								WHERE 
									dbo_id='$editando'";
		}
		//if($desenvolvimento_frd)echo '<br>sql_in = ' . $sql_in;
		$conexao->query($sql_in);
		$retorno['cadastro'] = 'sucesso';		
	} else {
		$retorno['cadastro'] 	= 'link_cadastrado';
		$retorno['dados_link']= $item_dados_db['dados_link'];
	}
}
echo json_encode($retorno);
?>
