<?php

namespace App\DAO;


use App\Conexao;
use App\Models\Filiado;

class FiliadoDAO
{

	public function getAll():array{
		$sQuery = "select * from flo_filiado order by flo_id desc";
		$oStmt = Conexao::conectar()->prepare($sQuery);
		$oStmt->execute();
		return $oStmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function cadastrar(Filiado $oFiliado):void {
		$sQuery = "insert into flo_filiado(flo_nome, flo_idade)values(?, ?);";
		$oStmt = Conexao::conectar()->prepare($sQuery);
		$oStmt->bindValue(1, $oFiliado->getNome());
		$oStmt->bindValue(2, $oFiliado->getIdade());
		$oStmt->execute();
	}

	public function deletar(int $iId):void{
		$sQuery = "delete from flo_filiado where flo_id = ? ";
		$oStmt = Conexao::conectar()->prepare($sQuery);
		$oStmt->bindValue(1, $iId);
		$oStmt->execute();
	}

}