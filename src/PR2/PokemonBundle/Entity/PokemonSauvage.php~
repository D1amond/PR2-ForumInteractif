<?php

namespace PR2\PokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PokemonSauvage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\PokemonBundle\Entity\PokemonSauvageRepository")
 */
class PokemonSauvage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveauMin", type="integer")
     */
    private $niveauMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveauMax", type="integer")
     */
    private $niveauMax;

    /**
     * @var string
     *
     * @ORM\Column(name="methode", type="string", length=255)
     */
    private $methode;

    /**
     * @var string
     *
     * @ORM\Column(name="methodeInfo", type="string", length=255)
     */
    private $methodeInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="rarete", type="integer")
     */
    private $rarete;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\PokemonBundle\Entity\BasePokemon", inversedBy="pokemonSauvages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $basePokemon;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Lieu", inversedBy="pokemonSauvages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set niveauMin
     *
     * @param integer $niveauMin
     * @return PokemonSauvage
     */
    public function setNiveauMin($niveauMin)
    {
        $this->niveauMin = $niveauMin;
    
        return $this;
    }

    /**
     * Get niveauMin
     *
     * @return integer 
     */
    public function getNiveauMin()
    {
        return $this->niveauMin;
    }

    /**
     * Set niveauMax
     *
     * @param integer $niveauMax
     * @return PokemonSauvage
     */
    public function setNiveauMax($niveauMax)
    {
        $this->niveauMax = $niveauMax;
    
        return $this;
    }

    /**
     * Get niveauMax
     *
     * @return integer 
     */
    public function getNiveauMax()
    {
        return $this->niveauMax;
    }

    /**
     * Set methode
     *
     * @param string $methode
     * @return PokemonSauvage
     */
    public function setMethode($methode)
    {
        $this->methode = $methode;
    
        return $this;
    }

    /**
     * Get methode
     *
     * @return string 
     */
    public function getMethode()
    {
        return $this->methode;
    }

    /**
     * Set methodeInfo
     *
     * @param string $methodeInfo
     * @return PokemonSauvage
     */
    public function setMethodeInfo($methodeInfo)
    {
        $this->methodeInfo = $methodeInfo;
    
        return $this;
    }

    /**
     * Get methodeInfo
     *
     * @return string 
     */
    public function getMethodeInfo()
    {
        return $this->methodeInfo;
    }

    /**
     * Set rarete
     *
     * @param integer $rarete
     * @return PokemonSauvage
     */
    public function setRarete($rarete)
    {
        $this->rarete = $rarete;
    
        return $this;
    }

    /**
     * Get rarete
     *
     * @return integer 
     */
    public function getRarete()
    {
        return $this->rarete;
    }

    /**
     * Set basePokemon
     *
     * @param \PR2\PokemonBundle\Entity\BasePokemon $basePokemon
     * @return PokemonSauvage
     */
    public function setBasePokemon(\PR2\PokemonBundle\Entity\BasePokemon $basePokemon)
    {
        $this->basePokemon = $basePokemon;
    
        return $this;
    }

    /**
     * Get basePokemon
     *
     * @return \PR2\PokemonBundle\Entity\BasePokemon 
     */
    public function getBasePokemon()
    {
        return $this->basePokemon;
    }

    /**
     * Set lieu
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieu
     * @return PokemonSauvage
     */
    public function setLieu(\PR2\ForumBundle\Entity\Lieu $lieu)
    {
        $this->lieu = $lieu;
    
        return $this;
    }

    /**
     * Get lieu
     *
     * @return \PR2\ForumBundle\Entity\Lieu 
     */
    public function getLieu()
    {
        return $this->lieu;
    }
}