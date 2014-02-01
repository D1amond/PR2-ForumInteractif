<?php

namespace PR2\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vue
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\ForumBundle\Entity\VueRepository")
 */
class Vue
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
       * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Membre")
       * @ORM\JoinColumn(nullable=false)
       */
      private $membre;

      /**
       * @ORM\ManyToOne(targetEntity="PR2\ForumBundle\Entity\Sujet", inversedBy="vues")
       * @ORM\JoinColumn(nullable=false)
       */
      private $sujet;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Vue
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set membre
     *
     * @param \PR2\ForumBundle\Entity\Membre $membre
     * @return Vue
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
     * Set sujet
     *
     * @param \PR2\ForumBundle\Entity\Sujet $sujet
     * @return Vue
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
}