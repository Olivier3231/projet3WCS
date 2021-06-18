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
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $total;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\OneToMany(targetEntity=Diligence::class, mappedBy="bill")
     */
    private $diligences;

    /**
     * @ORM\OneToMany(targetEntity=BillingMethod::class, mappedBy="bill")
     */
    private $billingMethods;

    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customer;

    /**
     * @ORM\OneToOne(targetEntity=BillStatus::class, mappedBy="bill", cascade={"persist", "remove"})
     */
    private $billStatus;

    public function __construct()
    {
        $this->diligences = new ArrayCollection();
        $this->billingMethods = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

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
            $diligence->setBill($this);
        }

        return $this;
    }

    public function removeDiligence(Diligence $diligence): self
    {
        if ($this->diligences->removeElement($diligence)) {
            // set the owning side to null (unless already changed)
            if ($diligence->getBill() === $this) {
                $diligence->setBill(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BillingMethod[]
     */
    public function getBillingMethods(): Collection
    {
        return $this->billingMethods;
    }

    public function addBillingMethod(BillingMethod $billingMethod): self
    {
        if (!$this->billingMethods->contains($billingMethod)) {
            $this->billingMethods[] = $billingMethod;
            $billingMethod->setBill($this);
        }

        return $this;
    }

    public function removeBillingMethod(BillingMethod $billingMethod): self
    {
        if ($this->billingMethods->removeElement($billingMethod)) {
            // set the owning side to null (unless already changed)
            if ($billingMethod->getBill() === $this) {
                $billingMethod->setBill(null);
            }
        }

        return $this;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

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
