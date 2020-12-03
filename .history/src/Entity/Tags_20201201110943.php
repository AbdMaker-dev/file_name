<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagsRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=TagsRepository::class)
 * 
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * normalizationContext={"groups"={"tags:read"}},
 * denormalizationContext={"groups"={"tags:write"}},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR')"},
 *      "post"
 * },
 * itemOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR')"},
 *      "put"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR')"},
 * },
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 * @ORM\Entity(repositoryClass=ProfileRepository::class)
 * @UniqueEntity(
 *     fields={"libelle"},
 *     message="libelle de ce  Tag existe"
 * )
 */
class Tags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"tags:read", "groupe_briefs:read", "grtags:read", "grtag_tags:read", "brief:read", "brief:write"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"tags:read", "groupe_briefs:read", "tags:write", "grtags:read", "grtags:write", "grtag_tags:read", "brief:read", "brief:write"})
     * @Assert\NotNull(message = "langue du Brief aubligatoire")
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"tags:read", "tags:write", "grtags:read", "grtags:write", "grtag_tags:read", "brief:read", "brief:write"})
     */
    private $deleted = false;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeTag::class, inversedBy="tags")
     */
    private $groupeTag;

    /**
     * @ORM\ManyToMany(targetEntity=Brief::class, mappedBy="tags")
     */
    private $briefs;


    public function __construct()
    {
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

    public function getGroupeTag(): ?GroupeTag
    {
        return $this->groupeTag;
    }

    public function setGroupeTag(?GroupeTag $groupeTag): self
    {
        $this->groupeTag = $groupeTag;

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
            $brief->addTag($this);
        }

        return $this;
    }

    public function removeBrief(Brief $brief): self
    {
        if ($this->briefs->removeElement($brief)) {
            $brief->removeTag($this);
        }

        return $this;
    }


}
