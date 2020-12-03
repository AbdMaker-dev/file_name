<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints as Assert; 
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 * @ApiResource(
 * 
 * normalizationContext={"groups"={"niveau:read"}},
 * denormalizationContext={"groups"={"niveau:write"}},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')  or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 * },
 * itemOperations={
 *  "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *  "put"={"access_control"="is_granted('ROLE_ADMIN')"}
 * },
 * 
 * )
 * 
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competence:read", "niveau:read", "groupe_briefs:read", "referentiel:read", "ref_gpc_c:read", "brief:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message = "libelle du Niveau aubligatoire")
     * @Groups({"niveau:write","niveau:read","niveau:write", "groupe_briefs:read", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read", "brief:read", "brief:write"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"competence:read", "niveau:read","niveau:write", "groupe_briefs:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read",  "brief:read", "brief:write"})
     */
    private $deleted = false;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="niveaux")
     * @Groups({"brief:read", "brief:write"})
     */
    private $competences;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message = "criEvaluation du Niveau aubligatoire")
     * @Groups({"niveau:write",  "brief:read", "brief:write""niveau:read","niveau:write", "groupe_briefs:read", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})
     */
    private $criEvaluation;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message = "grAction du Niveau aubligatoire")
     * @Groups({"niveau:write","niveau:read","niveau:write", "groupe_briefs:read", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})

     */
    private $grAction;

    /**
     * @ORM\ManyToMany(targetEntity=Brief::class, mappedBy="niveauCompetences")
     */
    private $briefs;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->briefs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->addNiveau($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            $competence->removeNiveau($this);
        }

        return $this;
    }

    public function getCriEvaluation(): ?string
    {
        return $this->criEvaluation;
    }

    public function setCriEvaluation(string $criEvaluation): self
    {
        $this->criEvaluation = $criEvaluation;

        return $this;
    }

    public function getGrAction(): ?string
    {
        return $this->grAction;
    }

    public function setGrAction(string $grAction): self
    {
        $this->grAction = $grAction;

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
            $brief->addNiveauCompetence($this);
        }

        return $this;
    }

    public function removeBrief(Brief $brief): self
    {
        if ($this->briefs->removeElement($brief)) {
            $brief->removeNiveauCompetence($this);
        }

        return $this;
    }
}
