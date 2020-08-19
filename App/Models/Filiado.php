<?php


namespace App\Models;

class Filiado
{
	private $iId;
	private $sNome;
	private $iIdade;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->iId;
	}

	/**
	 * @param mixed $iId
	 */
	public function setId($iId)
	{
		$this->iId = $iId;
	}

	/**
	 * @return mixed
	 */
	public function getNome()
	{
		return $this->sNome;
	}

	/**
	 * @param mixed $sNome
	 */
	public function setNome($sNome)
	{
		$this->sNome = $sNome;
	}

	/**
	 * @return mixed
	 */
	public function getIdade()
	{
		return $this->iIdade;
	}

	/**
	 * @param mixed $iIdade
	 */
	public function setIdade($iIdade)
	{
		$this->iIdade = $iIdade;
	}


}