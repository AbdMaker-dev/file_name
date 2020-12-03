<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 *  * @ApiResource(
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 *      "post"
 * },
 * itemOperations={
 *      "get",
 *      "put",
 *      "delete"
 * },
 * 
 * normalizationContext={"groups"={"profile_user:read"}},
 * denormalizationContext={"groups"={"profile_user:write"}},
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 */
class Competence
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
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeCompetence::class, inversedBy="competences")
     */
    private $groupeCompetence;

    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

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
}
