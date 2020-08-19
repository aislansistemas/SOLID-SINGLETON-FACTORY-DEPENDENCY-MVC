<?php


namespace App\DependencyContainer;


use App\DAO\FiliadoDAO;
use App\Models\Filiado;

class DC
{
	private static $oFiliadoDAO;
	private static $oFiliado;

	public static function getFiliadoDAO():FiliadoDAO{
		if(self::$oFiliadoDAO == null){
			self::$oFiliadoDAO = new FiliadoDAO();
		}
		return self::$oFiliadoDAO;
	}

	public static function getFiliado():Filiado{
		if(self::$oFiliado == null){
			self::$oFiliado = new Filiado();
		}
		return self::$oFiliado;
	}
}