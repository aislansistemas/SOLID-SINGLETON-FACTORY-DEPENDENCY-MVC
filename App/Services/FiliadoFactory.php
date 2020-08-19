<?php


namespace App\Services;


use App\DependencyContainer\DC;
use App\Models\Filiado;
use mysql_xdevapi\Exception;

class FiliadoFactory
{
	public function createFiliadoFromRequest(array $aDados):Filiado{
		DC::getFiliado()->setNome($aDados['nome']);
		DC::getFiliado()->setIdade($aDados['idade']);
		return DC::getFiliado();
	}
}