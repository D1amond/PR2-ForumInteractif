<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Lieu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\LieuRepository")
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
     * @ORM\Column(name="categorie", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="nomImage", type="string", length=255, nullable=TRUE)
     */
    private $nomImage;

    /**
     * @Assert\file(maxSize="900k", mimeTypes="png, jpg")
     */
    private $file;

    /**
       * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Region", inversedBy="lieux")
       * @ORM\JoinColumn(nullable=false)
       */
      private $region;

      /**
       * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Dresseur", mappedBy="lieu")
       */
      private $dresseurs;

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

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;

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
     * Set categorie
     *
     * @param string $categorie
     * @return Lieu
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
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
     * Set nomImage
     *
     * @param string $nomImage
     * @return Lieu
     */
    public function setNomImage($nomImage)
    {
        $this->nomImage = $nomImage;
    
        return $this;
    }

    /**
     * Get nomImage
     *
     * @return string 
     */
    public function getNomImage()
    {
        return $this->nomImage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dresseurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tuiles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sujets = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nomImage = "defaut.png";
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

    public function upload() {
        if (null === $this->file) {
            return;
        }
        $name = $this->file->getClientOriginalName();
        $this->file->move($this->getUploadRootDir(), $name);
        $this->nomImage = $name;
    }

    public function getUploadDir() {
        return 'uploads/image_lieu';
    }

    protected function getUploadRootDir() {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
}