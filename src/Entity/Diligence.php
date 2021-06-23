<?php

namespace App\Entity;

use App\Repository\DiligenceRepository;
use DateInterval;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiligenceRepository::class)
 */
class Diligence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity=Expertise::class, inversedBy="diligences")
     */
    private $expertise;

    /**
     * @ORM\ManyToOne(targetEntity=Bill::class, inversedBy="diligences")
     */
    private $bill;

    /**
     * @ORM\ManyToOne(targetEntity=Folder::class, inversedBy="diligences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $folder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getExpertise(): ?Expertise
    {
        return $this->expertise;
    }

    public function setExpertise(?Expertise $expertise): self
    {
        $this->expertise = $expertise;

        return $this;
    }

    public function getBill(): ?Bill
    {
        return $this->bill;
    }

    public function setBill(?Bill $bill): self
    {
        $this->bill = $bill;

        return $this;
    }

    public function getFolder(): ?Folder
    {
        return $this->folder;
    }

    public function setFolder(?Folder $folder): self
    {
        $this->folder = $folder;

        return $this;
    }
}