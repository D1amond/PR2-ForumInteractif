<?php

namespace PR2\Bundle\ShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use PR2\Bundle\CommonBundle\Entity\File;
use PR2\Bundle\ShowcaseBundle\Entity\HomePage;
use PR2\Bundle\ShowcaseBundle\Entity\Status;

/**
 * Panel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="PR2\Bundle\ShowcaseBundle\Entity\PanelRepository")
 */
class Panel
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @ORM\ManyToMany(targetEntity="PR2\Bundle\CommonBundle\Entity\File", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\Status")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\HomePage", inversedBy="mainPanel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $homePageMain;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\HomePage", inversedBy="secondaryPanel1")
     * @ORM\JoinColumn(nullable=true)
     */
    private $homePageSecondary1;

    /**
     * @ORM\OneToOne(targetEntity="PR2\Bundle\ShowcaseBundle\Entity\HomePage", inversedBy="secondaryPanel2")
     * @ORM\JoinColumn(nullable=true)
     */
    private $homePageSecondary2;


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
     * Set title
     *
     * @param string $title
     * @return Panel
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Panel
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Panel
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add image
     *
     * @param \PR2\Bundle\CommonBundle\Entity\File $image
     * @return Panel
     */
    public function addImage(File $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \PR2\Bundle\CommonBundle\Entity\File $image
     */
    public function removeImage(File $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set status
     *
     * @param \PR2\Bundle\ShowcaseBundle\Entity\Status $status
     * @return Panel
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \PR2\Bundle\ShowcaseBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set homePageMain
     *
     * @param \PR2\Bundle\ShowcaseBundle\Entity\HomePage $homePageMain
     * @return Panel
     */
    public function setHomePageMain(HomePage $homePageMain = null)
    {
        $this->homePageMain = $homePageMain;

        return $this;
    }

    /**
     * Get homePageMain
     *
     * @return \PR2\Bundle\ShowcaseBundle\Entity\HomePage 
     */
    public function getHomePageMain()
    {
        return $this->homePageMain;
    }

    /**
     * Set homePageSecondary1
     *
     * @param \PR2\Bundle\ShowcaseBundle\Entity\HomePage $homePageSecondary1
     * @return Panel
     */
    public function setHomePageSecondary1(HomePage $homePageSecondary1 = null)
    {
        $this->homePageSecondary1 = $homePageSecondary1;

        return $this;
    }

    /**
     * Get homePageSecondary1
     *
     * @return \PR2\Bundle\ShowcaseBundle\Entity\HomePage 
     */
    public function getHomePageSecondary1()
    {
        return $this->homePageSecondary1;
    }

    /**
     * Set homePageSecondary2
     *
     * @param \PR2\Bundle\ShowcaseBundle\Entity\HomePage $homePageSecondary2
     * @return Panel
     */
    public function setHomePageSecondary2(HomePage $homePageSecondary2 = null)
    {
        $this->homePageSecondary2 = $homePageSecondary2;

        return $this;
    }

    /**
     * Get homePageSecondary2
     *
     * @return \PR2\Bundle\ShowcaseBundle\Entity\HomePage 
     */
    public function getHomePageSecondary2()
    {
        return $this->homePageSecondary2;
    }
}
