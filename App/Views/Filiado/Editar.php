<?php include "App/Views/_Layout/Head.php"; ?>

	<div class="container">
		<h1>Edita dados do Filiado <?php echo $this->aDados['flo_nome']; ?></h1>
		<br><br>
		<form action="../editarpost" method="post">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo $this->aDados['flo_id']; ?>">
				<label>Nome</label>
				<input class="form-control inp-nome" type="text" name="nome" value="<?php echo $this->aDados['flo_nome']; ?>">
				<span class="text-danger valida-nome pt-1"></span>
			</div>
			<div class="form-group">
				<label>Idade</label>
				<input class="form-control inp-idade" type="text" name="idade" value="<?php echo $this->aDados['flo_idade']; ?>">
				<span class="text-danger valida-idade pt-1"></span>
			</div>
			<input class="btn btn-info btn-cadastro" type="submit" value="Editar">
		</form>
	</div>

<?php include "App/Views/_Layout/Footer.php"; ?>
