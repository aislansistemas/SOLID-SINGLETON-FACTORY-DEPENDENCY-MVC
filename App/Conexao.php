<?php
    namespace App;
	use PDO;

	/**
	 * Class Conexao
	 *
	 * @package App
	 * @version 1.0.0 - Versionamento inicial da classe.
	 */
	class Conexao
	{
		/**
		 * @var null $oInstance
		 */
		private static $oInstance = null;

		/**
		 * Função que retorna a conexão com o banco de dados
		 *
		 * @return PDO
		 *
		 * @author Aislan Peixoto aislanpeixoto@moobitech.com.br
		 *
		 * @since 1.0.0 - Definição do versionamento do método.
		 */
		public static function conectar():PDO
		{
			if (null === self::$oInstance) {

				try {
					self::$oInstance = new PDO(
						"mysql:host=mysql;port=3306;dbname=praticando_php;charset=utf8", "root",
						"123456"
					);
					return self::$oInstance;;
				} catch (PDOException $e) {
					echo '<p>' . $e->getMessage() . '</p>';
				}
			}
		}

	}