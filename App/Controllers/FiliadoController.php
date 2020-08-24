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

	public function editar(array $aRequest):void{
		$aResult = DC::getFiliadoDAO()->getById($aRequest['id']);
		if($aRequest == null){
			$this->render("Filiado/Index");
		}else{
			$this->aDados = $aResult;
			$this->render("Filiado/Editar");
		}
	}

	public function editarpost(array $aRequest):void {
		$oFiliado = (new FiliadoFactory())->createFiliadoFromRequest($aRequest);
		DC::getFiliadoDAO()->editar($oFiliado, $aRequest['id']);
		Redirect::redirectToAction("index");
	}

}