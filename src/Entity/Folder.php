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
     * @ORM\ManyToOne(targetEntity=ExpertiseList::class, inversedBy="folder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expertiseList;

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
     * @ORM\OneToMany(targetEntity=Diligence::class, mappedBy="folder")
     */
    private $diligences;

    public function __construct()
    {
        $this->created_at = new DateTime();
        $this->diligences = new ArrayCollection();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
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

    /**
     * @return Collection|Diligence[]
     */
    public function getDiligences(): Collection
    {
        return $this->diligences;
    }

    public function addDiligence(Diligence $diligence): self
    {
        if (!$this->diligences->contains($diligence)) {
            $this->diligences[] = $diligence;
            $diligence->setFolder($this);
        }

        return $this;
    }

    public function removeDiligence(Diligence $diligence): self
    {
        if ($this->diligences->removeElement($diligence)) {
            // set the owning side to null (unless already changed)
            if ($diligence->getFolder() === $this) {
                $diligence->setFolder(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return sprintf("%d - %s %s", $this->number, $this->customer->getLastname(), $this->customer->getFirstname());
    }

    public function getExpertiseList(): ?ExpertiseList
    {
        return $this->expertiseList;
    }

    public function setExpertiseList(?ExpertiseList $expertiseList): self
    {
        $this->expertiseList = $expertiseList;

        return $this;
    }
}