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
     * @Vich\Uploadablefield(mapping"upload_c", fileNameProperty="file)
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
}
