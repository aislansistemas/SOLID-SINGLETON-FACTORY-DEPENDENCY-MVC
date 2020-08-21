
function feedBack(resposta) {
	let h2Feed = $('<h2>');
	
	if(JSON.parse(resposta) === "sucesso"){
		setTimeout(() => {
			h2Feed.text("Filiado deletado com sucesso").addClass('text-success');
			$('#container-table').prepend(h2Feed);
		},500);
	}else{
		h2Feed.text("Erro! por favor tente novamente mais tarde").addClass('text-danger');
		$('#container-table').prepend(h2Feed);
	}

}