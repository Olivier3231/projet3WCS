<?php

namespace App\Entity;

use App\Repository\ExpertiseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExpertiseRepository::class)
 */
class Expertise
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=ExpertiseList::class, inversedBy="expertises")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expertise_list;

    /**
     * @ORM\OneToMany(targetEntity=Diligence::class, mappedBy="expertise")
     */
    private $diligences;

    public function __construct()
    {
        $this->diligences = new ArrayCollection();
    }

    public function __tostring()
    {
        return $this->getTitle();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getExpertiseList(): ?ExpertiseList
    {
        return $this->expertise_list;
    }

    public function setExpertiseList(?ExpertiseList $expertise_list): self
    {
        $this->expertise_list = $expertise_list;

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
            $diligence->setExpertise($this);
        }

        return $this;
    }

    public function removeDiligence(Diligence $diligence): self
    {
        if ($this->diligences->removeElement($diligence)) {
            // set the owning side to null (unless already changed)
            if ($diligence->getExpertise() === $this) {
                $diligence->setExpertise(null);
            }
        }

        return $this;
    }
}
