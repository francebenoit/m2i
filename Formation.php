<?php

namespace poo;

use Session;

class Formation
{
	private $nom;
	private $session;
	private $id;

	public function setNom($nom)
	{
		$this->nom = $nom ;
	}

	public function setSession($session)
	{
		$this->session = $session;
	}

	public function addSession($session)
	{
		array_push($this->session,$session)
	}
	private function setId($id)
	{
		$this->id = $id ;
	}
	
	public function getId()
	{
		return $this->id;
	}
	public function getNom()
	{
		return $this->nom ;
	}

	public function getSession()
	{
		return $this->session ;
	}

	public function Formation($nom,$session)
	{
		$this->nom = $nom ;
		$this->addSession($session);
	}
	public function Formation($nom)
	{
		$this->nom = $nom ;
		$this->session = null; //clean code
	}
}

?>