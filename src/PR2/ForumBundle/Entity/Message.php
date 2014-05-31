<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMod", type="datetime")
     */
    private $dateMod;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Sujet", inversedBy="messages", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sujet;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Dresseur", inversedBy="messages")
     */
    private $auteur;

    public function __construct() {
        $this->setDateCreation(new \Datetime());
        $this->setDateMod(new \Datetime());
    }
    
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
     * Set texte
     *
     * @param string $texte
     * @return Message
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Message
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
     * Set dateMod
     *
     * @param \DateTime $dateMod
     * @return Message
     */
    public function setDateMod($dateMod)
    {
        $this->dateMod = $dateMod;
    
        return $this;
    }

    /**
     * Get dateMod
     *
     * @return \DateTime 
     */
    public function getDateMod()
    {
        return $this->dateMod;
    }

    /**
     * Set sujet
     *
     * @param \PR2\ForumBundle\Entity\Sujet $sujet
     * @return Message
     */
    public function setSujet(\PR2\ForumBundle\Entity\Sujet $sujet)
    {
        $this->sujet = $sujet;
    
        return $this;
    }

    /**
     * Get sujet
     *
     * @return \PR2\ForumBundle\Entity\Sujet 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set auteur
     *
     * @param \PR2\ForumBundle\Entity\Dresseur $auteur
     * @return Message
     */
    public function setAuteur(\PR2\ForumBundle\Entity\Dresseur $auteur)
    {
        $this->auteur = $auteur;
    
        return $this;
    }

    /**
     * Get auteur
     *
     * @return \PR2\ForumBundle\Entity\Dresseur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }
    
    public function isModifie() {
        return $this->getDateCreation() == $this->getDateMod();
    }
}