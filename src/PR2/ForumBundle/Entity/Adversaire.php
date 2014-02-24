<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adversaire
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Adversaire
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
     * @var integer
     *
     * @ORM\Column(name="recompense", type="integer")
     */
    private $recompense;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Lieu", inversedBy="adversaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

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
     * @return Adversaire
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
     * Set recompense
     *
     * @param integer $recompense
     * @return Adversaire
     */
    public function setRecompense($recompense)
    {
        $this->recompense = $recompense;
    
        return $this;
    }

    /**
     * Get recompense
     *
     * @return integer 
     */
    public function getRecompense()
    {
        return $this->recompense;
    }
}
