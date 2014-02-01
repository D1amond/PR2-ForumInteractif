<?php

namespace PR2\ForumBundle\Entity;

class ImageTuile {
	private $nom;
	private $lien;

	public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setLien($lien)
    {
        $this->lien = $lien;
    
        return $this;
    }
    
    public function getLien()
    {
        return $this->lien;
    }

    public function __construct($nom, $lien)
    {
    	$this->nom = $nom;
    	$this->lien = $lien;
    }
}