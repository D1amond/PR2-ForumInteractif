<?php

namespace PR2\Bundle\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * File
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class File
{
    *
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     
    private $id;
/**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     *
     */
    private $subFolder = '';

    /**
     *
     */
    private $fileName = '';

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    private $temp;

    public function __toString()
    {
        return $this->getWebPath();
    }

    public function setSubFolder($subFolder)
    {
        $this->subFolder = $subFolder;
    }

    public function getSubFolder()
    {
        return $this->subFolder;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $this->fileName = sha1(uniqid(mt_rand(), true)).'.'.$this->getFile()->guessExtension();
            $this->name =  preg_replace('/[^A-Za-z0-9]/', "", substr($this->getFile()->getClientOriginalName(), 0, strpos($this->getFile()->getClientOriginalName(), '.')));
            
            if (strlen($this->getSubFolder()) > 0) {
                $this->path = $this->getSubFolder().'/'.$this->fileName;
            } else {
                $this->path = $this->fileName;
            }
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }
        if (strlen($this->getSubfolder()) > 0) {
            $this->getFile()->move($this->getUploadRootDir() .'/'. $this->getSubfolder(), $this->fileName);
        } else {
            $this->getFile()->move($this->getUploadRootDir(), $this->fileName);
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads';
    }
}
