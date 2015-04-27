<?php
class Centre
{
	private $nom;
	private $formation;	
	private $id;

	public function setNom($nom)
	{
		$this->nom = $nom ;
	}
	public function setFormation($formation)
	{
		$this->formation = $formation ;
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
	public function getFormation()
	{
		return $this->formation ;
	}
?>