<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\MembreRepository")
 */
class Membre implements UserInterface
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
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

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
     * @ORM\Column(name="roles", type="array")
     */
    private $roles;


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
     * @param string $username
     * @return Membre
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Membre
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
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
        $this->roles = array();
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
    
    public function setSalt($salt)
  {
    $this->salt = $salt;
    return $this;
  }

  public function getSalt()
  {
    return $this->salt;
  }

  public function setRoles(array $roles)
  {
    $this->roles = $roles;
    return $this;
  }

  public function getRoles()
  {
    return $this->roles;
  }

  public function eraseCredentials()
  {
  }
}