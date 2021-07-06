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

}