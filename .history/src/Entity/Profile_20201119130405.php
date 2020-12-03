<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfileRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 *      "post_profils_id_user"={
 *         "method"="GET",
 *         "path"="/profils/{id}/user",
 *         "normalization_context"={"groups"={"profils_id_user:re"}},
 *      },
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
 * @ORM\Entity(repositoryClass=ProfileRepository::class)
 */
class Profile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"profile_user:read", "user:read", "publication"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"profile_user:read", "profile_user:write", "user:read"})
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="profile")
     * @Groups({"profile_user:read"})
     */
    private $users;

    /**
     * @ORM\Column(name="deleted", type="boolean", options={"default":false})
     * @Groups({"profile_user:read", "profile_user:write"})
     */
    private $deleted = false;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setProfile($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeEdatalement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getProfile() === $this) {
                $user->setProfile(null);
            }
        }

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
