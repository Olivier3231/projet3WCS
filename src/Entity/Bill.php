<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
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
     * @ORM\OneToOne(targetEntity=BillStatus::class, mappedBy="bill", cascade={"persist", "remove"})
     */
    private $billStatus;


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


    public function getBillStatus(): ?BillStatus
    {
        return $this->billStatus;
    }

    public function setBillStatus(BillStatus $billStatus): self
    {
        // set the owning side of the relation if necessary
        if ($billStatus->getBill() !== $this) {
            $billStatus->setBill($this);
        }

        $this->billStatus = $billStatus;

        return $this;
    }
}