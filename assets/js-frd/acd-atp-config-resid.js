acd_atp_tipo_tempo = ['NENHUMA','RÁPIDA', 'REGULAR', 'MEDIA', 'ELEVADA', 'DEMORADA'];
for(var index in acd_atp_tipo_tempo){
	var valor = acd_atp_tipo_tempo[index].toUpperCase();
	$('#acd_atp_tipo_tempo, #pes_acd_atp_tipo_tempo').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_dif = ['NENHUMA', 'FÁCIL', 'REGULAR', 'MEDIA', 'ELEVADA', 'DIFÍCIL'];
for(var index in acd_atp_tipo_dif){
	var valor = acd_atp_tipo_dif[index].toUpperCase();
	$('#acd_atp_tipo_dif, #pes_acd_atp_tipo_dif').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_atencao = ['NENHUMA','POUCA', 'REGULAR', 'MEDIA', 'ELEVADA', 'MUITA'];
for(var index in acd_atp_tipo_atencao){
	var valor = acd_atp_tipo_atencao[index].toUpperCase();
	$('#acd_atp_tipo_atencao, #pes_acd_atp_tipo_atencao').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_1 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE', 'OBSERVAÇÃO', 'CONTEÚDO', 'HABILIDADE'];
for(var index in acd_atp_tipo_repres_1){
	var valor = acd_atp_tipo_repres_1[index].toUpperCase();
	$('#acd_atp_tipo_repres_1, #pes_acd_atp_tipo_repres_1').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_2 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE','OBSERVAÇÃO', 'CONTEÚDO', 'HABILIDADE'];
for(var index in acd_atp_tipo_repres_2){
	var valor = acd_atp_tipo_repres_2[index].toUpperCase();
	$('#acd_atp_tipo_repres_2, #pes_acd_atp_tipo_repres_2').append('<option value="'+valor+'">'+valor+'</option>');	
}
acd_atp_tipo_repres_3 = ['NENHUMA', 'TEXTO', 'FIGURA', 'PSICOLÓGICA', 'LÓGICA', 'PERGUNTA', 'ASSERTIVIDADE','OBSERVAÇÃO', 'CONTEÚDO', 'HABILIDADE'];
for(var index in acd_atp_tipo_repres_3){
	var valor = acd_atp_tipo_repres_3[index].toUpperCase();
	$('#acd_atp_tipo_repres_3, #pes_acd_atp_tipo_repres_3').append('<option value="'+valor+'">'+valor+'</option>');	
}