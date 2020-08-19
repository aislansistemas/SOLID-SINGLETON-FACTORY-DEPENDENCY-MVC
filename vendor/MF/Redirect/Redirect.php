<?php


namespace MF\Redirect;


class Redirect
{
	public static function redirectToAction(string $sAction):void{
		header("Location: ".strtolower($sAction));
	}
}