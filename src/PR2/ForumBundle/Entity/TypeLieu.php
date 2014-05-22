<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeLieu
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TypeLieu
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Lieu", mappedBy="type")
     */
    private $lieux;

    /**
     * Constructor
     */
    public function __construct($titre = '', $description = '')
    {
        $this->lieux = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setTitre($titre);
        $this->setDescription($description);
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
     * @return Action
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
     * Set description
     *
     * @param string $description
     * @return Action
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
     * Add lieux
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieux
     * @return Region
     */
    public function addLieux(\PR2\ForumBundle\Entity\Lieu $lieux)
    {
        $this->lieux[] = $lieux;
    
        return $this;
    }

    /**
     * Remove lieux
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieux
     */
    public function removeLieux(\PR2\ForumBundle\Entity\Lieu $lieux)
    {
        $this->lieux->removeElement($lieux);
    }

    /**
     * Get lieux
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLieux()
    {
        return $this->lieux;
    }
}
