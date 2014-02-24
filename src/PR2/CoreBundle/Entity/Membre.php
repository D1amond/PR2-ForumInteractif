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
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

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
     * Set avatar
     *
     * @param string $avatar
     * @return Membre
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    
        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

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
        $this->avatar = "defaut.jpg";
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
}