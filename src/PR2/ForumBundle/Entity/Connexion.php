<?php

namespace PR2\ForumBundle\Entity;

class Connexion
{
	private $identifiant;
	private $motDePasse;
	private $resterEnLigne;

	public function __construct()
    {
        $this->resterEnLigne = false;
    }

    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    
        return $this;
    }

    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    
        return $this;
    }

    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    public function setResterEnLigne($resterEnLigne)
    {
        $this->resterEnLigne = $resterEnLigne;
    
        return $this;
    }

    public function getResterEnLigne()
    {
        return $this->resterEnLigne;
    }
}