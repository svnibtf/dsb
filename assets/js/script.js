function toggle_ver_senha(id_input) {
	var input = document.querySelector('#'+ id_input);
	input.type = input.type == 'text' ? 'password' : 'text';
}

