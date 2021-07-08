<?php

namespace App\Entity;

use App\Repository\UploadBackgroundRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=UploadBackgroundRepository::class)
 * @Vich\Uploadable
 */
class UploadBackground
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $upload;

    /**
     * @Vich\Uploadablefield(mapping"upload_background", fileNameProperty="file)
     * @var file
     */
    private $imageFile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUpload(): ?string
    {
        return $this->upload;
    }

    public function setUpload(string $upload): self
    {
        $this->upload = $upload;

        return $this;
    }

    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;
        if ($file) {
            $this->createdAt = new \DateTime('now');    
        }

    public function getImageFile()
    {
        
    }
    }
}
