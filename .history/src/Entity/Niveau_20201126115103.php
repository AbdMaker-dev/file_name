<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=NiveauRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
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
 * @UniqueEntity("libelle")
 */
class Niveau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competence:read", "referentiel:read", "ref_gpc_c:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"niveau:write", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups({"competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})
     */
    private $deleted = false;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="niveaux")
     */
    private $competences;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message = "criEvaluation du Niveau aubligatoire")
     * @Groups({"niveau:write", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})
     */
    private $criEvaluation;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull(message = "grAction du Niveau aubligatoire")
     * @Groups({"niveau:write", "competence:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read"})

     */
    private $grAction;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
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
}
