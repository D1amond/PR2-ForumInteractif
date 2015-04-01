<?php

namespace PR2\PokemonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\SerializerBundle\Annotation\ExclusionPolicy;
use JMS\SerializerBundle\Annotation\Expose;

/**
 * BasePokemon
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\PokemonBundle\Entity\BasePokemonRepository")
 * @ExclusionPolicy("all")
 */
class BasePokemon
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="noNational", type="integer")
     * @Expose
     */
    private $noNational;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Expose
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type1", type="string", length=255)
     * @Expose
     */
    private $type1;

    /**
     * @var string
     *
     * @ORM\Column(name="type2", type="string", length=255)
     * @Expose
     */
    private $type2;

    /**
     * @var string
     *
     * @ORM\Column(name="classification", type="string", length=255)
     * @Expose
     */
    private $classification;

    /**
     * @var float
     *
     * @ORM\Column(name="grandeur", type="float")
     * @Expose
     */
    private $grandeur;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float")
     * @Expose
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="tauxCapture", type="integer")
     */
    private $tauxCapture;

    /**
     * @var integer
     *
     * @ORM\Column(name="basePasOeuf", type="integer")
     */
    private $basePasOeuf;

    /**
     * @var string
     *
     * @ORM\Column(name="typeExp", type="string", length=255)
     */
    private $typeExp;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseJoie", type="integer")
     */
    private $baseJoie;

    /**
     * @var integer
     *
     * @ORM\Column(name="tauxFuite", type="integer")
     */
    private $tauxFuite;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Expose
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="basePV", type="integer")
     * @Expose
     */
    private $basePV;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseAtt", type="integer")
     * @Expose
     */
    private $baseAtt;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseDef", type="integer")
     * @Expose
     */
    private $baseDef;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseSpAtt", type="integer")
     * @Expose
     */
    private $baseSpAtt;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseSpDef", type="integer")
     * @Expose
     */
    private $baseSpDef;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseVit", type="integer")
     * @Expose
     */
    private $baseVit;

    /**
     * @var string
     *
     * @ORM\Column(name="methodeEvo", type="string", length=255)
     */
    private $methodeEvo;

    /**
     * @var integer
     *
     * @ORM\Column(name="chanceM", type="integer")
     * @Expose
     */
    private $chanceM;

    /**
     * @var integer
     *
     * @ORM\Column(name="chanceF", type="integer")
     * @Expose
     */
    private $chanceF;

    /**
     * @var integer
     *
     * @ORM\Column(name="baseExp", type="integer")
     */
    private $baseExp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="starter", type="boolean")
     */
    private $starter;

    /**
     * @var integer
     *
     * @ORM\Column(name="requetes", type="integer")
     */
    private $requetes = 0;

    /**
     * @ORM\OneToMany(targetEntity="PR2\PokemonBundle\Entity\PokemonSauvage", mappedBy="basePokemon")
     */
    private $pokemonSauvages;

    /**
     * @ORM\OneToOne(targetEntity="PR2\CoreBundle\Entity\Image", cascade={"persist", "remove"})
     * @Expose
     */
    private $image;

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
     * Set noNational
     *
     * @param integer $noNational
     * @return BasePokemon
     */
    public function setNoNational($noNational)
    {
        $this->noNational = $noNational;
    
        return $this;
    }

    /**
     * Get noNational
     *
     * @return integer 
     */
    public function getNoNational()
    {
        return $this->noNational;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return BasePokemon
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type1
     *
     * @param string $type1
     * @return BasePokemon
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
    
        return $this;
    }

    /**
     * Get type1
     *
     * @return string 
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * Set type2
     *
     * @param string $type2
     * @return BasePokemon
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
    
        return $this;
    }

    /**
     * Get type2
     *
     * @return string 
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * Set classification
     *
     * @param string $classification
     * @return BasePokemon
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;
    
        return $this;
    }

    /**
     * Get classification
     *
     * @return string 
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set grandeur
     *
     * @param float $grandeur
     * @return BasePokemon
     */
    public function setGrandeur($grandeur)
    {
        $this->grandeur = $grandeur;
    
        return $this;
    }

    /**
     * Get grandeur
     *
     * @return float 
     */
    public function getGrandeur()
    {
        return $this->grandeur;
    }

    /**
     * Set poids
     *
     * @param float $poids
     * @return BasePokemon
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    
        return $this;
    }

    /**
     * Get poids
     *
     * @return float 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set tauxCapture
     *
     * @param integer $tauxCapture
     * @return BasePokemon
     */
    public function setTauxCapture($tauxCapture)
    {
        $this->tauxCapture = $tauxCapture;
    
        return $this;
    }

    /**
     * Get tauxCapture
     *
     * @return integer 
     */
    public function getTauxCapture()
    {
        return $this->tauxCapture;
    }

    /**
     * Set basePasOeuf
     *
     * @param integer $basePasOeuf
     * @return BasePokemon
     */
    public function setBasePasOeuf($basePasOeuf)
    {
        $this->basePasOeuf = $basePasOeuf;
    
        return $this;
    }

    /**
     * Get basePasOeuf
     *
     * @return integer 
     */
    public function getBasePasOeuf()
    {
        return $this->basePasOeuf;
    }

    /**
     * Set typeExp
     *
     * @param string $typeExp
     * @return BasePokemon
     */
    public function setTypeExp($typeExp)
    {
        $this->typeExp = $typeExp;
    
        return $this;
    }

    /**
     * Get typeExp
     *
     * @return string 
     */
    public function getTypeExp()
    {
        return $this->typeExp;
    }

    /**
     * Set baseJoie
     *
     * @param integer $baseJoie
     * @return BasePokemon
     */
    public function setBaseJoie($baseJoie)
    {
        $this->baseJoie = $baseJoie;
    
        return $this;
    }

    /**
     * Get baseJoie
     *
     * @return integer 
     */
    public function getBaseJoie()
    {
        return $this->baseJoie;
    }

    /**
     * Set tauxFuite
     *
     * @param integer $tauxFuite
     * @return BasePokemon
     */
    public function setTauxFuite($tauxFuite)
    {
        $this->tauxFuite = $tauxFuite;
    
        return $this;
    }

    /**
     * Get tauxFuite
     *
     * @return integer 
     */
    public function getTauxFuite()
    {
        return $this->tauxFuite;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return BasePokemon
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set basePV
     *
     * @param integer $basePV
     * @return BasePokemon
     */
    public function setBasePV($basePV)
    {
        $this->basePV = $basePV;
    
        return $this;
    }

    /**
     * Get basePV
     *
     * @return integer 
     */
    public function getBasePV()
    {
        return $this->basePV;
    }

    /**
     * Set baseAtt
     *
     * @param integer $baseAtt
     * @return BasePokemon
     */
    public function setBaseAtt($baseAtt)
    {
        $this->baseAtt = $baseAtt;
    
        return $this;
    }

    /**
     * Get baseAtt
     *
     * @return integer 
     */
    public function getBaseAtt()
    {
        return $this->baseAtt;
    }

    /**
     * Set baseDef
     *
     * @param integer $baseDef
     * @return BasePokemon
     */
    public function setBaseDef($baseDef)
    {
        $this->baseDef = $baseDef;
    
        return $this;
    }

    /**
     * Get baseDef
     *
     * @return integer 
     */
    public function getBaseDef()
    {
        return $this->baseDef;
    }

    /**
     * Set baseSpAtt
     *
     * @param integer $baseSpAtt
     * @return BasePokemon
     */
    public function setBaseSpAtt($baseSpAtt)
    {
        $this->baseSpAtt = $baseSpAtt;
    
        return $this;
    }

    /**
     * Get baseSpAtt
     *
     * @return integer 
     */
    public function getBaseSpAtt()
    {
        return $this->baseSpAtt;
    }

    /**
     * Set baseSpDef
     *
     * @param integer $baseSpDef
     * @return BasePokemon
     */
    public function setBaseSpDef($baseSpDef)
    {
        $this->baseSpDef = $baseSpDef;
    
        return $this;
    }

    /**
     * Get baseSpDef
     *
     * @return integer 
     */
    public function getBaseSpDef()
    {
        return $this->baseSpDef;
    }

    /**
     * Set baseVit
     *
     * @param integer $baseVit
     * @return BasePokemon
     */
    public function setBaseVit($baseVit)
    {
        $this->baseVit = $baseVit;
    
        return $this;
    }

    /**
     * Get baseVit
     *
     * @return integer 
     */
    public function getBaseVit()
    {
        return $this->baseVit;
    }

    /**
     * Set methodeEvo
     *
     * @param string $methodeEvo
     * @return BasePokemon
     */
    public function setMethodeEvo($methodeEvo)
    {
        $this->methodeEvo = $methodeEvo;
    
        return $this;
    }

    /**
     * Get methodeEvo
     *
     * @return string 
     */
    public function getMethodeEvo()
    {
        return $this->methodeEvo;
    }

    /**
     * Set chanceM
     *
     * @param integer $chanceM
     * @return BasePokemon
     */
    public function setChanceM($chanceM)
    {
        $this->chanceM = $chanceM;
    
        return $this;
    }

    /**
     * Get chanceM
     *
     * @return integer 
     */
    public function getChanceM()
    {
        return $this->chanceM;
    }

    /**
     * Set chanceF
     *
     * @param integer $chanceF
     * @return BasePokemon
     */
    public function setChanceF($chanceF)
    {
        $this->chanceF = $chanceF;
    
        return $this;
    }

    /**
     * Get chanceF
     *
     * @return integer 
     */
    public function getChanceF()
    {
        return $this->chanceF;
    }

    /**
     * Set baseExp
     *
     * @param integer $baseExp
     * @return BasePokemon
     */
    public function setBaseExp($baseExp)
    {
        $this->baseExp = $baseExp;
    
        return $this;
    }

    /**
     * Get baseExp
     *
     * @return integer 
     */
    public function getBaseExp()
    {
        return $this->baseExp;
    }

    /**
     * Set starter
     *
     * @param boolean $starter
     * @return BasePokemon
     */
    public function setStarter($starter)
    {
        $this->starter = $starter;
    
        return $this;
    }

    /**
     * Get starter
     *
     * @return boolean 
     */
    public function getStarter()
    {
        return $this->starter;
    }

    /**
     * Set requetes
     *
     * @param integer $requetes
     * @return BasePokemon
     */
    public function setRequetes($requetes)
    {
        $this->requetes = $requetes;
    
        return $this;
    }

    /**
     * Get requetes
     *
     * @return integer 
     */
    public function getRequetes()
    {
        return $this->requetes;
    }

    /**
     * Get image
     *
     * @return image
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setImage(\PR2\CoreBundle\Entity\Image $image = null)
    {
       $this->image = $image;
    }
}
