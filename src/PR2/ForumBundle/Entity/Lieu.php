<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Lieu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\LieuRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Lieu
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Region", inversedBy="lieux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\TypeLieu", inversedBy="lieux")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Dresseur", mappedBy="lieu")
     */
    private $dresseurs;
    
    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Adversaire", mappedBy="lieu")
     */
    private $adversaires;

    /**
     * @ORM\ManyToMany(targetEntity="PR2\ForumBundle\Entity\TypeAdversaire")
     */
    private $typesAdversaire;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Tuile", mappedBy="lieu")
     */
    private $tuiles;

    /**
     * @ORM\OneToMany(targetEntity="PR2\PokemonBundle\Entity\PokemonSauvage", mappedBy="lieu")
     */
    private $pokemonSauvages;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Sujet", mappedBy="lieu")
     */
    private $sujets;

    /**
     * @ORM\OneToOne(targetEntity="PR2\CoreBundle\Entity\Image", cascade={"persist", "remove"})
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
     * Set nom
     *
     * @param string $nom
     * @return Lieu
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
     * Set description
     *
     * @param string $description
     * @return Lieu
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
     * Constructor
     */
    public function __construct()
    {
        $this->dresseurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tuiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sujets = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set region
     *
     * @param \PR2\ForumBundle\Entity\Region $region
     * @return Lieu
     */
    public function setRegion(\PR2\ForumBundle\Entity\Region $region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return \PR2\ForumBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
    
    /**
     * Set type
     *
     * @param \PR2\ForumBundle\Entity\TypeLieu $type
     * @return Lieu
     */
    public function setType(\PR2\ForumBundle\Entity\TypeLieu $type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \PR2\ForumBundle\Entity\TypeLieu
     */
    public function getType()
    {
        return $this->type;
    }

    public function getDernierSujet(){
        $dernierSujet = null;
        foreach ($this->getSujets() as $sujet) {
            if($dernierSujet != null){
                if($sujet->getDateCreation() > $dernierSujet->getDateCreation()){
                    $dernierSujet = $sujet;
                }
            } else{
                $dernierSujet = $sujet;
            }
        }
        return $dernierSujet;
    }

    public function getTotalMessages(){
        $total = 0;
        if (count($this->getSujets()) > 0){
            foreach ($this->getSujets() as $sujet) {
                $total += count($sujet->getMessages());
            }  
        }
        return $total;
    }

    /**
     * Add dresseurs
     *
     * @param \PR2\ForumBundle\Entity\Dresseur $dresseurs
     * @return Lieu
     */
    public function addDresseur(\PR2\ForumBundle\Entity\Dresseur $dresseurs)
    {
        $this->dresseurs[] = $dresseurs;
    
        return $this;
    }

    /**
     * Remove dresseurs
     *
     * @param \PR2\ForumBundle\Entity\Dresseur $dresseurs
     */
    public function removeDresseur(\PR2\ForumBundle\Entity\Dresseur $dresseurs)
    {
        $this->dresseurs->removeElement($dresseurs);
    }

    /**
     * Get dresseurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDresseurs()
    {
        return $this->dresseurs;
    }

    /**
     * Add tuiles
     *
     * @param \PR2\ForumBundle\Entity\Tuile $tuiles
     * @return Lieu
     */
    public function addTuile(\PR2\ForumBundle\Entity\Tuile $tuiles)
    {
        $this->tuiles[] = $tuiles;
    
        return $this;
    }

    /**
     * Remove tuiles
     *
     * @param \PR2\ForumBundle\Entity\Tuile $tuiles
     */
    public function removeTuile(\PR2\ForumBundle\Entity\Tuile $tuiles)
    {
        $this->tuiles->removeElement($tuiles);
    }

    /**
     * Get tuiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTuiles()
    {
        return $this->tuiles;
    }

    /**
     * Add pokemonSauvages
     *
     * @param \PR2\PokemonBundle\Entity\PokemonSauvage $pokemonSauvages
     * @return Lieu
     */
    public function addPokemonSauvage(\PR2\PokemonBundle\Entity\PokemonSauvage $pokemonSauvages)
    {
        $this->pokemonSauvages[] = $pokemonSauvages;
    
        return $this;
    }

    /**
     * Remove pokemonSauvages
     *
     * @param \PR2\PokemonBundle\Entity\PokemonSauvage $pokemonSauvages
     */
    public function removePokemonSauvage(\PR2\PokemonBundle\Entity\PokemonSauvage $pokemonSauvages)
    {
        $this->pokemonSauvages->removeElement($pokemonSauvages);
    }

    /**
     * Get pokemonSauvages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPokemonSauvages()
    {
        return $this->pokemonSauvages;
    }

    /**
     * Add sujets
     *
     * @param \PR2\ForumBundle\Entity\Sujet $sujets
     * @return Lieu
     */
    public function addSujet(\PR2\ForumBundle\Entity\Sujet $sujets)
    {
        $this->sujets[] = $sujets;
    
        return $this;
    }

    /**
     * Remove sujets
     *
     * @param \PR2\ForumBundle\Entity\Sujet $sujets
     */
    public function removeSujet(\PR2\ForumBundle\Entity\Sujet $sujets)
    {
        $this->sujets->removeElement($sujets);
    }

    /**
     * Get sujets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSujets()
    {
        return $this->sujets;
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