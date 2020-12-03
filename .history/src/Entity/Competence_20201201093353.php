<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert; 
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')  or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 * },
 * itemOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "put"={"access_control"="is_granted('ROLE_ADMIN')"}
 * },
 * 
 * normalizationContext={"groups"={"competence:read"}},
 * denormalizationContext={"groups"={"competence:write"}},
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * 
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 *  @UniqueEntity(
 *     fields={"libelle"},
 *     message="libelle existe"
 * )
 */
class Competence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"competence:read", "groupe_briefs:read", "gp_competence:read", "referentiel:read", "ref_gpc_c:read", "brief:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"competence:read", "groupe_briefs:read", "competence:write", "gp_competence:read", "gp_competence:write", "referentiel:read", "ref_gpc_c:read", "brief:read", "brief:write"})
     * @Assert\NotNull(message = "libelle du Competence aubligatoire")
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeCompetence::class, inversedBy="competences")
     * @Groups({"ref_gpc_c:read", "competence:write", "brief:read", "brief:write"})
     */
    private $groupeCompetence;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"competence:read", "gp_competence:read"})
     */
    private $deleted = false;

    /**
     * @ORM\ManyToMany(targetEntity=Niveau::class, inversedBy="competences", cascade={"persist"})
     * @Groups({"competence:read", "gp_competence:read", "groupe_briefs:read", "competence:write", "gp_competence:write", "referentiel:read", "ref_gpc_c:read", "brief:read", "brief:write"})
     */
    private $niveaux;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="competences")
     */
    private $referentiels;

    /**
     * @ORM\ManyToMany(targetEntity=Brief::class, mappedBy="competences")
     */
    private $briefs;

    public function __construct()
    {
        $this->niveaux = new ArrayCollection();
        $this->referentiels = new ArrayCollection();
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

    public function getGroupeCompetence(): ?GroupeCompetence
    {
        return $this->groupeCompetence;
    }

    public function setGroupeCompetence(?GroupeCompetence $groupeCompetence): self
    {
        $this->groupeCompetence = $groupeCompetence;

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
     * @return Collection|Niveau[]
     */
    public function getNiveaux(): Collection
    {
        return $this->niveaux;
    }

    public function addNiveau(Niveau $niveau): self
    {
        if (!$this->niveaux->contains($niveau)) {
            $this->niveaux[] = $niveau;
        }

        return $this;
    }

    public function removeNiveau(Niveau $niveau): self
    {
        $this->niveaux->removeElement($niveau);

        return $this;
    }

    /**
     * @return Collection|Referentiel[]
     */
    public function getReferentiels(): Collection
    {
        return $this->referentiels;
    }

    public function addReferentiel(Referentiel $referentiel): self
    {
        if (!$this->referentiels->contains($referentiel)) {
            $this->referentiels[] = $referentiel;
            $referentiel->addCompetence($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->removeElement($referentiel)) {
            $referentiel->removeCompetence($this);
        }

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
            $brief->addCompetence($this);
        }

        return $this;
    }

    public function removeBrief(Brief $brief): self
    {
        if ($this->briefs->removeElement($brief)) {
            $brief->removeCompetence($this);
        }

        return $this;
    }
}
