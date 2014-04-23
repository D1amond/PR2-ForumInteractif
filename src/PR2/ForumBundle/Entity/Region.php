<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Region
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
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Lieu", mappedBy="region")
     */
    private $lieux;

    /**
     * @ORM\OneToMany(targetEntity="PR2\ForumBundle\Entity\Tuile", mappedBy="region", cascade={"persist", "remove"})
     * @ORM\OrderBy({"posY" = "ASC", "posX" = "ASC"})
     */
    private $tuiles;

    /**
     * @ORM\OneToOne(targetEntity="PR2\CoreBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $image;

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
     * @return Region
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
     * Set description
     *
     * @param string $description
     * @return Region
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
     * @return Region
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
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lieux = new \Doctrine\Common\Collections\ArrayCollection();
        for ($y=0;$y<10;$y++) //Position X
        {
            for ($i=0;$i<10;$i++) //Position Y
            {
                $tuile = new Tuile($this);
                $tuile->setPosX($i);
                $tuile->setPosY($y);
                $this->addTuile($tuile);
            };
        };
    }

    public function getCurrentTuile($position) {
        $tuile = $this->tuiles[$position];
        return $tuile;
    }

    public function getPreviousTuile($position) {
        if ($position > 0) {
            $previousTuile = $this->tuiles[$position - 1];
        } else {
            $previousTuile = $this->tuiles[$position];
        }
        return $previousTuile;
    }

    public function getNextTuile($position) {
        if ($position < count($this->tuiles) - 1) {
            $nextTuile = $this->tuiles[$position + 1];
        } else {
            $nextTuile = null;
        }
        return $nextTuile;
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

    /**
     * Add tuiles
     *
     * @param \PR2\ForumBundle\Entity\Tuile $tuiles
     * @return Region
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

    public function addTuilesTop() {
        $nouvTuiles = array();
        $tuile = null;
        for ($i=0; $i < ($this->getTotalTuilesY() - 1); $i++) { 
            $tuile = new Tuile($this);
            $tuile->setPosX($i);
            $tuile->setPosY(0);
            $nouvTuiles[] = $tuile;
        }
        foreach ($this->tuiles as $item) {
            $item->setPosY($item->getPosY() + 1);
        }
        foreach ($nouvTuiles as $item) {
            $this->addTuile($item);
        }
    }

    private function getTotalTuilesX()
    {
        $total = 0;
        foreach ($this->tuiles as $item) {
            if ($item->getPosX() > $total) {
                $total = $item->getPosX();
            }
        };
        return $total + 1;
    }

    private function getTotalTuilesY()
    {
        $total = 0;
        foreach ($this->tuiles as $item) {
            if ($item->getPosY() > $total) {
                $total = $item->getPosY();
            }
        };
        return $total + 1;
    }

    //Statistiques

    public function getTotalTuiles()
    {
        return count($this->tuiles);
    }

    public function getTotalLieux()
    {
        return count($this->lieux);
    }
    public function getTotalSujets()
    {
        $total = 0;
        foreach ($this->lieux as $lieu) {
            $total += count($lieu->getSujets());
        };
        return $total;
    }
}