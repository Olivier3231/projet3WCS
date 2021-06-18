<?php

namespace App\Entity;

use App\Repository\DiligenceRepository;
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
     * @ORM\Column(type="dateinterval")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity=Expertise::class, inversedBy="diligences")
     */
    private $expertise;

    /**
     * @ORM\ManyToOne(targetEntity=Bill::class, inversedBy="diligences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bill;

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

    public function getDuration(): ?\DateInterval
    {
        return $this->duration;
    }

    public function setDuration(\DateInterval $duration): self
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
}
