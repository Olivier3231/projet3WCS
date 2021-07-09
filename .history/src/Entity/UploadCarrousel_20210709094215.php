<?php

namespace App\Entity;

use App\Repository\UploadCarrouselRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=UploadCarrouselRepository::class)
 * @Vich\Uploadable
 */
class UploadCarrousel
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
     * NOTE: This is not a mapped field of entity me
     * @Vich\Uploadablefield(mapping="upload_carrousel", fileNameProperty="upload")
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
    public function setImageUpload(File $upload = null)
    {
        $this->imageUpload = $upload;
        if ($upload) {
            $this->createdAt = new \DateTime('now');
        }
    }

    public function getImageUpload()
    {
        return $this->imageUpload;
    }
}
