<?php

namespace App\Entity;

use App\Repository\UploadBackgroundRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\

/**
 * @ORM\Entity(repositoryClass=UploadBackgroundRepository::class)
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
