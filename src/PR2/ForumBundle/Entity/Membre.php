<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\MembreRepository")
 */
class Membre
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
     * @ORM\Column(name="identifiant", type="string", length=255)
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasse", type="string", length=255)
     */
    private $motDePasse;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

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
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;


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
     * Set identifiant
     *
     * @param string $identifiant
     * @return Membre
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    
        return $this;
    }

    /**
     * Get identifiant
     *
     * @return string 
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Set motDePasse
     *
     * @param string $motDePasse
     * @return Membre
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    
        return $this;
    }

    /**
     * Get motDePasse
     *
     * @return string 
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

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
        $this->dresseurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->avatar = "defaut.jpg";
        $this->estEnLigne = false;
        $this->dateInscrit = new \DateTime();
        $this->role = "Utilisateur";
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
     * Set role
     *
     * @param string $role
     * @return Membre
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
}