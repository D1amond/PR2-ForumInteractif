<?php

namespace PR2\SettingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\SettingsBundle\Entity\ThemeRepository")
 */
class Theme
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
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="imageFond", type="string", length=255)
     */
    private $imageFond;

    /**
     * @var integer
     *
     * @ORM\Column(name="classement", type="integer")
     */
    private $classement;

    public function __construct() 
    {
        $this->classement = 0;
        $this->imageFond = 'background1.jpg';
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
     * Set nom
     *
     * @param string $nom
     * @return Theme
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
     * Set imageFond
     *
     * @param string $imageFond
     * @return Theme
     */
    public function setImageFond($imageFond)
    {
        $this->imageFond = $imageFond;
    
        return $this;
    }

    /**
     * Get imageFond
     *
     * @return string 
     */
    public function getImageFond()
    {
        return $this->imageFond;
    }

    /**
     * Set classement
     *
     * @param integer $classement
     * @return Theme
     */
    public function setClassement($classement)
    {
        $this->classement = $classement;
    
        return $this;
    }

    /**
     * Get classement
     *
     * @return integer 
     */
    public function getClassement()
    {
        return $this->classement;
    }
}
