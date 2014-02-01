<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dresseur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\DresseurRepository")
 */
class Dresseur
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
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="descPhy", type="text")
     */
    private $descPhy;

    /**
     * @var string
     *
     * @ORM\Column(name="descPsy", type="text")
     */
    private $descPsy;

    /**
     * @var string
     *
     * @ORM\Column(name="histoire", type="text")
     */
    private $histoire;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=TRUE)
     */
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="bourse", type="integer")
     */
    private $bourse;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Membre", inversedBy="dresseurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $membre;

    /*
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Sujet", mappedBy="auteur")
     */
    private $sujets;

    /*
     * @ORM\ManyToMany(targetEntity="PR2\ForumBundle\Entity\Sujet", cascade={"persist"})
     */
    private $sujetsSuivis;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Lieu", inversedBy="dresseurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Message", mappedBy="auteur")
     */
    private $messages;

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
     * @return Dresseur
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
     * Set prenom
     *
     * @param string $prenom
     * @return Dresseur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Dresseur
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    
        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Dresseur
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set descPhy
     *
     * @param string $descPhy
     * @return Dresseur
     */
    public function setDescPhy($descPhy)
    {
        $this->descPhy = $descPhy;
    
        return $this;
    }

    /**
     * Get descPhy
     *
     * @return string 
     */
    public function getDescPhy()
    {
        return $this->descPhy;
    }

    /**
     * Set descPsy
     *
     * @param string $descPsy
     * @return Dresseur
     */
    public function setDescPsy($descPsy)
    {
        $this->descPsy = $descPsy;
    
        return $this;
    }

    /**
     * Get descPsy
     *
     * @return string 
     */
    public function getDescPsy()
    {
        return $this->descPsy;
    }

    /**
     * Set membre
     *
     * @param \PR2\ForumBundle\Entity\Membre $membre
     * @return Dresseur
     */
    public function setMembre(\PR2\ForumBundle\Entity\Membre $membre)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \PR2\ForumBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sujets = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add sujets
     *
     * @param \PR2\ForumBundle\Entity\Sujet $sujets
     * @return Dresseur
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
     * Set lieu
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieu
     * @return Dresseur
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

    /**
     * Set avatar
     *
     * @param string $avatar
     * @return Dresseur
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
     * Add messages
     *
     * @param \PR2\ForumBundle\Entity\Message $messages
     * @return Dresseur
     */
    public function addMessage(\PR2\ForumBundle\Entity\Message $messages)
    {
        $this->messages[] = $messages;
    
        return $this;
    }

    /**
     * Remove messages
     *
     * @param \PR2\ForumBundle\Entity\Message $messages
     */
    public function removeMessage(\PR2\ForumBundle\Entity\Message $messages)
    {
        $this->messages->removeElement($messages);
    }

    /**
     * Get messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Set bourse
     *
     * @param integer $bourse
     * @return Dresseur
     */
    public function setBourse($bourse)
    {
        $this->bourse = $bourse;
    
        return $this;
    }

    /**
     * Get bourse
     *
     * @return integer 
     */
    public function getBourse()
    {
        return $this->bourse;
    }

    /**
     * Set histoire
     *
     * @param string $histoire
     * @return Dresseur
     */
    public function setHistoire($histoire)
    {
        $this->histoire = $histoire;
    
        return $this;
    }

    /**
     * Get histoire
     *
     * @return string 
     */
    public function getHistoire()
    {
        return $this->histoire;
    }
}