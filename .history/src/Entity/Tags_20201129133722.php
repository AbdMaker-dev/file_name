<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

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
 *     message="libelle de ce  Profile existe"
 * )
 */
class Tags
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"tags:read", "grtags:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"tags:read", "tags:write", "grtags:read", "grtag_:write"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"tags:read", "tags:write", "grtags:read", "grtags:write"})
     */
    private $deleted = false;

    /**
     * @ORM\ManyToOne(targetEntity=GroupeTag::class, inversedBy="tags")
     */
    private $groupeTag;

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
}
