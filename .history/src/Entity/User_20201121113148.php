<?php

namespace App\Entity;

use App\Filter\UserFilter;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "apprenant" = "Apprenant", "cm" = "Cm", "formateur" = "Formateur", "admin" = "Admin"})
 * 
 * @ApiResource(
 * routePrefix="/admin",
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 * },
 * 
 *  itemOperations={
 *      "get",
 *      "put"
 * },
 * normalizationContext={"groups"={"user:read"}},
 * denormalizationContext={"groups"={"user:write"}},
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(UserFilter::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read", "user:write", "profile_user:read", "profils_id_user:read"})
     */
    protected $username;

    /**
     * @ORM\Column(type="json")
     * @Groups({"user:read", "profile_user:read", "profils_id_user:read"})
     */
    protected $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write", "profils_id_user:read"})
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write",})
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write",})
     */
    protected $prenom;

    /**
     * @ORM\ManyToOne(targetEntity=Profile::class, inversedBy="users")
     * @Groups({"user:read", "user:write",})
     */
    private $profile;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"user:read", "user:write",})
     */
    private $deleted = false;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\
     */
    private $email;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $avatare;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.$this->getProfile()->getLibelle();

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): self
    {
        $this->profile = $profile;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAvatare()
    {
        return $this->avatare;
    }

    public function setAvatare($avatare): self
    {
        $this->avatare = $avatare;

        return $this;
    }

}
