acd_atp_origem = ['NENHUMA', 'VESTIBULAR', 'ENEM', 'CONCURSO', 'DESAFIOS', 'OUTROS'];
for(var index in acd_atp_origem){
	$('#acd_atp_origem').append('<option value="'+acd_atp_origem[index]+'">'+acd_atp_origem[index]+'</option>');	
}
$('#acd_atp_ano').append('<option value="INDEFINIDO">INDEFINIDO</option>');	
for(var i= 2016; i>1960; i--){
	$('#acd_atp_ano').append('<option value="'+i+'">'+i+'</option>');	
}
acd_atp_eixo = ['NENHUMA', 'CIÊNCIAS HUMANAS', 'CIÊNCIAS DA NATUREZA', 'LINGUAGENS E CÓDIGOS', 'MATEMÁTICA', 'IDIOMAS','OUTROS'];
for(var index in acd_atp_eixo){
	var valor = acd_atp_eixo[index].toUpperCase();
	$('#acd_atp_eixo').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_disc = ['NENHUMA', 'LÍNGUA PORTUGUESA', 'lÍNGUA INGLESA', 'lÍNGUA ESPANHOLA', 'LITERATURA BRASILEIRA', 'MATEMÁTICA', 'FÍSICA', 'QUÍMICA', 'BIOLOGIA', 'GEOGRAFIA', 'HISTÓRIA', 'REDAÇÃO', 'RACIOCÍNIO LÓGICO', 'ÉTICA NO SERVIÇO PÚBLICO', 'ATUALIDADES', 'INFORMÁTICA', 'CONHECIMENTOS GERAIS','OUTRAS'];
for(var index in acd_atp_disc){
	var valor = acd_atp_disc[index].toUpperCase();
	$('#acd_atp_disc').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_alter_corr = ['A','B', 'C', 'D', 'E'];
for(var index in acd_atp_alter_corr){
	var valor = acd_atp_alter_corr[index].toUpperCase();
	$('#acd_atp_alter_corr').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_tempo = ['NENHUMA','RÁPIDA', 'REGULAR', 'MEDIA', 'ELEVADA', 'DEMORADA'];
for(var index in acd_atp_tipo_tempo){
	var valor = acd_atp_tipo_tempo[index].toUpperCase();
	$('#acd_atp_tipo_tempo').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_dif = ['NENHUMA', 'FÁCIL', 'REGULAR', 'MEDIA', 'ELEVADA', 'DIFÍCIL'];
for(var index in acd_atp_tipo_dif){
	var valor = acd_atp_tipo_dif[index].toUpperCase();
	$('#acd_atp_tipo_dif').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_atencao = ['NENHUMA','POUCA', 'REGULAR', 'MEDIA', 'ELEVADA', 'MUITA'];
for(var index in acd_atp_tipo_atencao){
	var valor = acd_atp_tipo_atencao[index].toUpperCase();
	$('#acd_atp_tipo_atencao').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_1 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE', 'OBSERVAÇÃO'];
for(var index in acd_atp_tipo_repres_1){
	var valor = acd_atp_tipo_repres_1[index].toUpperCase();
	$('#acd_atp_tipo_repres_1').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_2 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE','OBSERVAÇÃO'];
for(var index in acd_atp_tipo_repres_2){
	var valor = acd_atp_tipo_repres_2[index].toUpperCase();
	$('#acd_atp_tipo_repres_2').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_3 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE','OBSERVAÇÃO'];
for(var index in acd_atp_tipo_repres_3){
	var valor = acd_atp_tipo_repres_3[index].toUpperCase();
	$('#acd_atp_tipo_repres_3').append('<option value="'+valor+'">'+valor+'</option>');	
}