<?php

namespace PR2\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\CoreBundle\Entity\MembreRepository")
 */
class Membre extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estEnLigne", type="boolean")
     */
    private $estEnLigne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscrit", type="datetime")
     */
    private $dateInscrit;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Dresseur", mappedBy="membre")
     */
    private $dresseurs;

    /**
     * @ORM\OneToOne(targetEntity="PR2\CoreBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * Set estEnLigne
     *
     * @param boolean $estEnLigne
     * @return Membre
     */
    public function setEstEnLigne($estEnLigne)
    {
        $this->estEnLigne = $estEnLigne;
    
        return $this;
    }

    /**
     * Get estEnLigne
     *
     * @return boolean 
     */
    public function getEstEnLigne()
    {
        return $this->estEnLigne;
    }

    /**
     * Set dateInscrit
     *
     * @param \DateTime $dateInscrit
     * @return Membre
     */
    public function setDateInscrit($dateInscrit)
    {
        $this->dateInscrit = $dateInscrit;
    
        return $this;
    }

    /**
     * Get dateInscrit
     *
     * @return \DateTime 
     */
    public function getDateInscrit()
    {
        return $this->dateInscrit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->dresseurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->estEnLigne = false;
        $this->dateInscrit = new \DateTime();
    }
    
    /**
     * Add dresseurs
     *
     * @param \PR2\ForumBundle\Entity\Dresseur $dresseurs
     * @return Membre
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