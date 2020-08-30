<?php

	require_once "vendor/autoload.php";
	use MF\Redirect\Redirect;

	if(!empty($_REQUEST['controller'])) {
        $sNomeController = ucfirst(strtolower($_REQUEST['controller'])) . "Controller";
        $oClass = "App\Controllers\\" . $sNomeController;
        if (!class_exists($oClass)) {
            echo "Controller não encontrado";
            die();
        } else {
            $oController = new $oClass();
            if ($_REQUEST['action']) {

                $sAction = $_REQUEST['action'];
                $oController->$sAction($_REQUEST);
            }else{
			    header('Location: '.strtolower($_REQUEST['controller']).'/index');
		    }

        }
    } else {
		//controller intanciado por default caso o usuario não especifique
		Redirect::redirectToAction('Location: filiado/index');
    }
