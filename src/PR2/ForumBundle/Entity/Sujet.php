<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sujet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\SujetRepository")
 */
class Sujet
{
    public function __construct()
      {
        $this->dateCreation = new \Datetime();
        $this->estActif = true;
        $this->dateFermeture = null;
      }

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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estActif", type="boolean")
     */
    private $estActif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFermeture", type="datetime", nullable=TRUE)
     */
    private $dateFermeture;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=TRUE)
     */
    private $resume;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Vue", mappedBy="sujet")
     */
    private $vues;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Message", mappedBy="sujet")
     */
    private $messages;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Lieu", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Dresseur", inversedBy="sujets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $auteur;
      
    public function getDresseurs(){
        $lesDresseurs =  new \Doctrine\Common\Collections\ArrayCollection();
        foreach ($this->getMessages() as $message){
            $lesDresseurs->add($message->getAuteur());
        }
        return $lesDresseurs;
    }

    public function getDernierMessage(){
        $dernierMessage =  null;
        foreach ($this->getMessages() as $message) {
            if($dernierMessage != null){
                if($message->getDateCreation() > $dernierMessage->getDateCreation()){
                    $dernierMessage = $message;
                }
            } else{
                $dernierMessage = $message;
            }
        }
        return $dernierMessage;
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
     * Set titre
     *
     * @param string $titre
     * @return Sujet
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Sujet
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
     * Set estActif
     *
     * @param boolean $estActif
     * @return Sujet
     */
    public function setEstActif($estActif)
    {
        $this->estActif = $estActif;
    
        return $this;
    }

    /**
     * Get estActif
     *
     * @return boolean 
     */
    public function getEstActif()
    {
        return $this->estActif;
    }

    /**
     * Set nbCombats
     *
     * @param integer $nbCombats
     * @return Sujet
     */
    public function setNbCombats($nbCombats)
    {
        $this->nbCombats = $nbCombats;
    
        return $this;
    }

    /**
     * Get nbCombats
     *
     * @return integer 
     */
    public function getNbCombats()
    {
        return $this->nbCombats;
    }

    /**
     * Set expTotalDist
     *
     * @param integer $expTotalDist
     * @return Sujet
     */
    public function setExpTotalDist($expTotalDist)
    {
        $this->expTotalDist = $expTotalDist;
    
        return $this;
    }

    /**
     * Get expTotalDist
     *
     * @return integer 
     */
    public function getExpTotalDist()
    {
        return $this->expTotalDist;
    }

    /**
     * Set dateFermeture
     *
     * @param \DateTime $dateFermeture
     * @return Sujet
     */
    public function setDateFermeture($dateFermeture)
    {
        $this->dateFermeture = $dateFermeture;
    
        return $this;
    }

    /**
     * Get dateFermeture
     *
     * @return \DateTime 
     */
    public function getDateFermeture()
    {
        return $this->dateFermeture;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Sujet
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    
        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Add vues
     *
     * @param \PR2\ForumBundle\Entity\Vue $vues
     * @return Sujet
     */
    public function addVue(\PR2\ForumBundle\Entity\Vue $vues)
    {
        $this->vues[] = $vues;
    
        return $this;
    }

    /**
     * Remove vues
     *
     * @param \PR2\ForumBundle\Entity\Vue $vues
     */
    public function removeVue(\PR2\ForumBundle\Entity\Vue $vues)
    {
        $this->vues->removeElement($vues);
    }

    /**
     * Get vues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVues()
    {
        return $this->vues;
    }

    /**
     * Set auteur
     *
     * @param \PR2\ForumBundle\Entity\Dresseur $auteur
     * @return Sujet
     */
    public function setAuteur(\PR2\ForumBundle\Entity\Dresseur $auteur = null)
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

    /**
     * Add messages
     *
     * @param \PR2\ForumBundle\Entity\Message $messages
     * @return Sujet
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
     * Set lieu
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieu
     * @return Sujet
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