<?php

namespace App\Entity;

use App\Repository\BriefGroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BriefGroupeRepository::class)
 */
class BriefGroupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=EtatBriefGroupes::class, inversedBy="briefGroupes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etatBriefGroupe;

    /**
     * @ORM\ManyToMany(targetEntity=Brief::class, mappedBy="groupes")
     */
    private $briefs;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="briefs")
     */
    private $groupes;

    public function __construct()
    {
        $this->briefs = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatBriefGroupe(): ?EtatBriefGroupes
    {
        return $this->etatBriefGroupe;
    }

    public function setEtatBriefGroupe(?EtatBriefGroupes $etatBriefGroupe): self
    {
        $this->etatBriefGroupe = $etatBriefGroupe;

        return $this;
    }

    /**
     * @return Collection|Brief[]
     */
    public function getBriefs(): Collection
    {
        return $this->briefs;
    }

    public function addBrief(Brief $brief): self
    {
        if (!$this->briefs->contains($brief)) {
            $this->briefs[] = $brief;
            $brief->addGroupe($this);
        }

        return $this;
    }

    public function removeBrief(Brief $brief): self
    {
        if ($this->briefs->removeElement($brief)) {
            $brief->removeGroupe($this);
        }

        return $this;
    }

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->addBrief($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeBrief($this);
        }

        return $this;
    }
}
