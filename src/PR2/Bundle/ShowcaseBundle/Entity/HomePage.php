<?php

namespace PR2\Bundle\ShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use PR2\Bundle\ShowcaseBundle\Entity\Panel;
use PR2\Bundle\ShowcaseBundle\Entity\Alert;

/**
 * HomePage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\Bundle\ShowcaseBundle\Entity\HomePageRepository")
 */
class HomePage
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
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\Panel", mappedBy="homePageMain")
     * @ORM\JoinColumn(nullable=false)
     */
    private $mainPanel;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\Panel", mappedBy="homePageSecondary1")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secondaryPanel1;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\Panel", mappedBy="homePageSecondary2")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secondaryPanel2;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\Alert")
     * @ORM\JoinColumn(nullable=true)
     */
    private $alert;


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
     * Set isActive
     *
     * @param boolean $isActive
     * @return HomePage
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set mainPanel
     *
     * @param \PR2\ShowcaseBundle\Entity\Panel $mainPanel
     * @return HomePage
     */
    public function setMainPanel(Panel $mainPanel)
    {
        $this->mainPanel = $mainPanel;

        return $this;
    }

    /**
     * Get mainPanel
     *
     * @return \PR2\ShowcaseBundle\Entity\Panel 
     */
    public function getMainPanel()
    {
        return $this->mainPanel;
    }

    /**
     * Set secondaryPanel1
     *
     * @param \PR2\ShowcaseBundle\Entity\Panel $secondaryPanel1
     * @return HomePage
     */
    public function setSecondaryPanel1(Panel $secondaryPanel1)
    {
        $this->secondaryPanel1 = $secondaryPanel1;

        return $this;
    }

    /**
     * Get secondaryPanel1
     *
     * @return \PR2\ShowcaseBundle\Entity\Panel 
     */
    public function getSecondaryPanel1()
    {
        return $this->secondaryPanel1;
    }

    /**
     * Set secondaryPanel2
     *
     * @param \PR2\ShowcaseBundle\Entity\Panel $secondaryPanel2
     * @return HomePage
     */
    public function setSecondaryPanel2(Panel $secondaryPanel2)
    {
        $this->secondaryPanel2 = $secondaryPanel2;

        return $this;
    }

    /**
     * Get secondaryPanel2
     *
     * @return \PR2\ShowcaseBundle\Entity\Panel 
     */
    public function getSecondaryPanel2()
    {
        return $this->secondaryPanel2;
    }

    /**
     * Set alert
     *
     * @param \PR2\ShowcaseBundle\Entity\Alert $alert
     * @return HomePage
     */
    public function setAlert(Alert $alert = null)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return \PR2\ShowcaseBundle\Entity\Alert 
     */
    public function getAlert()
    {
        return $this->alert;
    }
}
