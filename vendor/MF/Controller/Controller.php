<?php
	
	namespace MF\Controller;

	/**
	 * Class Controller
	 *
	 * @package MF\Controller
	 * @version 1.0.0 - Versionamento inicial da classe.
	 */
	class Controller 
	{
		/**
		 * @var string $sView
		 */
		protected $sView;
		/**
		 * @var string $sAction
		 */
		protected $sAction;

		/**
		 * Função que renderiza uma View com base no parâmetro
		 *
		 * @param string $sView
		 * @return void
		 *
		 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
		 *
		 * @since 1.0.0 - Definição do versionamento do método.
		 */
		protected function render(string $sView):void{

			$this->sView = ucfirst($sView);
			
			if(file_exists("App/Views/{$this->sView}.php")){
				include "App/Views/{$this->sView}.php";
			}else{
				include "App/Views/Erro/Notfound.php";
			}

		}

	}