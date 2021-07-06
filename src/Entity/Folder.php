<?php

namespace App\Entity;

use App\Repository\FolderRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FolderRepository::class)
 */
class Folder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="folders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="folders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Owner;

    /**
     * @ORM\ManyToOne(targetEntity=BusinessType::class, inversedBy="folders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $businessType;


    public function __construct()
    {
        $this->created_at = new DateTime();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function __toString()
    {
        return sprintf("%d - %s %s", $this->customer->getLastname(), $this->customer->getFirstname());
    }

    public function getOwner(): ?Owner
    {
        return $this->Owner;
    }

    public function setOwner(?Owner $Owner): self
    {
        $this->Owner = $Owner;

        return $this;
    }

    public function getBusinessType(): ?BusinessType
    {
        return $this->businessType;
    }

    public function setBusinessType(?BusinessType $businessType): self
    {
        $this->businessType = $businessType;

        return $this;
    }

}