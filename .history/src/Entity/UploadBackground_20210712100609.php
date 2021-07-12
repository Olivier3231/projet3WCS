<?php

namespace App\Entity;

use App\Repository\UploadBackgroundRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Self_;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use  Vich\UploaderBundle\Form\Type\ VichImageType ;




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
     * @Vich\Uploadablefield(mapping="upload_background", fileNameProperty="upload")
     * @var upload
     */
    private $imageUpload;

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

    public function setImageUpload(File $imageUpload = null)
    {
        $this->imageUpload = $imageUpload;
        if (null !== $imageUpload) {
            $this->createdAt = new \DateTime('now');
        }
        return $this;
    }

    public function getImageUpload()
    {
        return $this->imageUpload;
    }

}
