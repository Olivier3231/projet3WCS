<?php

namespace App\Entity;

use App\Repository\BillStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillStatusRepository::class)
 */
class BillStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $unpayed;

    /**
     * @ORM\Column(type="boolean")
     */
    private $in_progress;

    /**
     * @ORM\OneToOne(targetEntity=Bill::class, inversedBy="billStatus", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $bill;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayed(): ?bool
    {
        return $this->payed;
    }

    public function setPayed(bool $payed): self
    {
        $this->payed = $payed;

        return $this;
    }

    public function getUnpayed(): ?bool
    {
        return $this->unpayed;
    }

    public function setUnpayed(bool $unpayed): self
    {
        $this->unpayed = $unpayed;

        return $this;
    }

    public function getInProgress(): ?bool
    {
        return $this->in_progress;
    }

    public function setInProgress(bool $in_progress): self
    {
        $this->in_progress = $in_progress;

        return $this;
    }

    public function getBill(): ?Bill
    {
        return $this->bill;
    }

    public function setBill(Bill $bill): self
    {
        $this->bill = $bill;

        return $this;
    }
}
