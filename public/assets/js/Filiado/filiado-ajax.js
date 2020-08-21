
$.get("listagem", (dados) => {
	montaHtmlListagemFiliados(dados);
});

function deletar(id){
	$.post("deletar", {id: id}, (resposta) => {
		setTimeout(() => {
			feedBack(resposta);
		},1000);
	})
}