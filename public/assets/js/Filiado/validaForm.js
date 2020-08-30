


$('.btn-cadastro').on("click", (e) => {
	let inpNome = $('.inp-nome').val();
	let inpIdade = $('.inp-idade').val();
	 
	if(validaInputs(inpNome, inpIdade)){
		return true;
	}
	e.preventDefault();
});

function validaInputs(nome, idade){
	if(nome.length == 0){
		$('.valida-nome').text("Campo Obrigatório");
		return false;
	}
	if(idade.length == 0){
		$('.valida-idade').text("Campo Obrigatório");
		return false;
	}
	return true;
	
}



