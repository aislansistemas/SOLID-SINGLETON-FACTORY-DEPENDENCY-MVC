<?php include "App/Views/_Layout/Head.php"; ?>
	
	<div class="container">
		<h1>Cadastro</h1>
		<br><br>
		<form action="cadastrarpost" method="post">
			<div class="form-group">
				<label>Nome</label>
				<input class="form-control inp-nome" type="text" name="nome">
				<span class="text-danger valida-nome pt-1"></span>
			</div>
			<div class="form-group">
				<label>Idade</label>
				<input class="form-control inp-idade" type="text" name="idade">
				<span class="text-danger valida-idade pt-1"></span>
			</div>		
			<input class="btn btn-info btn-cadastro" type="submit" value="Cadastrar">
		</form>
	</div>	

<?php include "App/Views/_Layout/Footer.php"; ?>
