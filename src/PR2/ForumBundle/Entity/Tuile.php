<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tuile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\TuileRepository")
 */
class Tuile
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="posX", type="integer")
     */
    private $posX;

    /**
     * @var integer
     *
     * @ORM\Column(name="posY", type="integer")
     */
    private $posY;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Lieu", inversedBy="tuiles")
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Region", inversedBy="tuiles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;

    public function __construct(Region $region) 
    {
        $this->region = $region;
        $this->type = "vide.png";
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
     * Set type
     *
     * @param string $type
     * @return Tuile
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set posX
     *
     * @param integer $posX
     * @return Tuile
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;
    
        return $this;
    }

    /**
     * Get posX
     *
     * @return integer 
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param integer $posY
     * @return Tuile
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;
    
        return $this;
    }

    /**
     * Get posY
     *
     * @return integer 
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set lieu
     *
     * @param \PR2\ForumBundle\Entity\Lieu $lieu
     * @return Tuile
     */
    public function setLieu(\PR2\ForumBundle\Entity\Lieu $lieu = null)
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
     * Set region
     *
     * @param \PR2\ForumBundle\Entity\Region $region
     * @return Tuile
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
}