//FUNÇÃO RECEBE O NOME DO FORMULÁRIO E RETRONA OS CAMPOS EM UM ARRAY JSON..../////
function get_array_dados_form(form){
	var campos = '.'+form+' :input';
	var $inputs = $(campos);
	var values = {};
	$inputs.each(function() {
			values[this.name] = $(this).val();
	});
	return values;
}

function validar_alfanum(value){
	var char="0123456789abcdefghyjklmnopqrstuvwxyz";
   value = value.toLowerCase();
   for(i=0; i<value.length; i++){
      if (char.indexOf(value.charAt(i),0) == -1){
				console.log(i , '--11-- ', char.indexOf(value.charAt(i),0));
         return false;
      }
   }
   return true;
}