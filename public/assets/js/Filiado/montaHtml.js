
function montaHtmlListagemFiliados(dadosQuery){
	let dados = JSON.parse(dadosQuery);
	for (let i = 0; i < dados.length; i++) {
		let tr = $('<tr>');
		let tdNome = $('<td>').text(dados[i].flo_nome).addClass("td-nome");
		let tdIdade = $('<td>').text(dados[i].flo_idade).addClass("td-idade");
		let btnDelete = $('<button>').text('EXCLUIR').addClass('btn btn-danger btn-sm');
		btnDelete.on("click", () => {
			deletar(dados[i].flo_id);
			tr.addClass('animate');
			setTimeout(() => {
				tr.remove();
			},500);
		});
		let tdBtnDelete = $('<td>').addClass('btn-delete').append(btnDelete);
		tr.append(tdNome);
		tr.append(tdIdade);
		tr.append(tdBtnDelete);
		$('.listagem-filiados').append(tr);
	}
}