<?php


namespace App\Controllers;

use App\DependencyContainer\DC;
use App\Services\FiliadoFactory;
use MF\Controller\Controller;
use MF\Redirect\Redirect;

class FiliadoController extends Controller
{
	protected $aDados;

	public function index():void{
		
		$this->render("Filiado/Index");
	}

	public function listagem():void{
		echo json_encode($this->aDados = DC::getFiliadoDAO()->getAll());
	}

	public function cadastrar():void{
		$this->render("Filiado/Cadastrar");
	}

	public function cadastrarpost(array $aRequest):void{
		$oFiliado = (new FiliadoFactory())->createFiliadoFromRequest($aRequest);
		DC::getFiliadoDAO()->cadastrar($oFiliado);
		Redirect::redirectToAction("index");
	}

	public function deletar(array $aRequest):void {
		try{
			DC::getFiliadoDAO()->deletar($aRequest['id']);
			echo json_encode("sucesso");
		}catch(Exeption $e){
			echo json_encode("erro");
		}

	}
}