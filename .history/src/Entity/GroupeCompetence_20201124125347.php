<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeCompetenceRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ORM\Entity(repositoryClass=GroupeCompetenceRepository::class)
 * 
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * normalizationContext={"groups"={"gp_competence:read"}},
 * denormalizationContext={"groups"={"gp_competence:write"}},
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
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 */
class GroupeCompetence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"gp_competence:read", "ref_gpc_c:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"gp_competence:read", "gp_competence:write", "ref_gpc_c:read"})
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Competence::class, mappedBy="groupeCompetence", cascade={"persist"})
     * @Groups({"gp_competence:read"})
     * @ApiSubresource
     */
    private $competences;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"gp_competence:read", "ref_gpc_c:read"})
     */
    private $deleted = false;


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
            $competence->setGroupeCompetence($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getGroupeCompetence() === $this) {
                $competence->setGroupeCompetence(null);
            }
        }

        return $this;
    }

    public function setComptences($competences)
    {
        foreach ($competences as $key => $value) {
        
        }
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
}
