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
		$this->aDados = DC::getFiliadoDAO()->getAll();
		$this->render("Filiado/Index");
	}

	public function cadastrar():void{
		$this->render("Filiado/Cadastrar");
	}

	public function cadastrarpost(array $aRequest):void{
		$oFiliadoFactory = (new FiliadoFactory())->createFiliadoFromRequest($aRequest);
		DC::getFiliadoDAO()->cadastrar($oFiliadoFactory);
		Redirect::redirectToAction("index");
	}
}