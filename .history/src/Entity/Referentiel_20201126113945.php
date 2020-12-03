<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert; 
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ReferentielRepository::class)
 * 
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * normalizationContext={"groups"={"referentiel:read"}},
 * denormalizationContext={"groups"={"referentiel:write"}},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "ref_gpc_c"={
 *          "method"="GET",
 *          "path"= "/referentiels/grpecompetences",
 *          "normalization_context"={"groups"={"ref_gpc_c:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 * },
 * itemOperations={
 *  "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *  "put"={"access_control"="is_granted('ROLE_ADMIN')"}
 * },
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 * @UniqueEntity("libelle")
 */
class Referentiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"referentiel:read", "ref_gpc_c:read", "promo:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write", "promo:read"})
     * @Assert\NotNull(message = "libelle aubligatoire")
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write", "promo:read"})
     * @Assert\NotBlank
     */
    private $presentation;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write"})
     */
    private $deleted = false;

    /**
     * @ORM\OneToMany(targetEntity=CritereAdmission::class, mappedBy="referentiel", cascade={"persist"})
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write", "promo:read"})
     */
    private $crAdmission;

    /**
     * @ORM\OneToMany(targetEntity=CritereEvaluation::class, mappedBy="referentiel", cascade={"persist"})
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write", "promo:read"})
     */
    private $crEvaluation;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="referentiels")
     * @Groups({"referentiel:read", "ref_gpc_c:read", "referentiel:write"})
     */
    private $competences;

    /**
     * @ORM\OneToMany(targetEntity=Promo::class, mappedBy="referentiel")
     */
    private $promos;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
        $this->crAdmission = new ArrayCollection();
        $this->crEvaluation = new ArrayCollection();
        $this->promos = new ArrayCollection();
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

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

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
     * @return Collection|CritereAdmission[]
     */
    public function getCrAdmission(): Collection
    {
        return $this->crAdmission;
    }

    public function addCrAdmission(CritereAdmission $crAdmission): self
    {
        if (!$this->crAdmission->contains($crAdmission)) {
            $this->crAdmission[] = $crAdmission;
            $crAdmission->setReferentiel($this);
        }

        return $this;
    }

    public function setCrAdmission($crAdmissions)
    {
        foreach ($crAdmissions as $key => $crAdmission) {
            $this->addCrAdmission($crAdmission);
        }

        return $this;
    }

    public function removeCrAdmission(CritereAdmission $crAdmission): self
    {
        if ($this->crAdmission->removeElement($crAdmission)) {
            // set the owning side to null (unless already changed)
            if ($crAdmission->getReferentiel() === $this) {
                $crAdmission->setReferentiel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CritereEvaluation[]
     */
    public function getCrEvaluation(): Collection
    {
        return $this->crEvaluation;
    }

    public function addCrEvaluation(CritereEvaluation $crEvaluation): self
    {
        if (!$this->crEvaluation->contains($crEvaluation)) {
            $this->crEvaluation[] = $crEvaluation;
            $crEvaluation->setReferentiel($this);
        }

        return $this;
    }

    public function removeCrEvaluation(CritereEvaluation $crEvaluation): self
    {
        if ($this->crEvaluation->removeElement($crEvaluation)) {
            // set the owning side to null (unless already changed)
            if ($crEvaluation->getReferentiel() === $this) {
                $crEvaluation->setReferentiel(null);
            }
        }

        return $this;
    }

    public function setCrEvaluation($crEvaluations)
    {
        foreach ($crEvaluations as $key => $crEvaluation) {
            $this->addCrEvaluation($crEvaluation);
        }

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
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->setReferentiel($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            // set the owning side to null (unless already changed)
            if ($promo->getReferentiel() === $this) {
                $promo->setReferentiel(null);
            }
        }

        return $this;
    }

}
