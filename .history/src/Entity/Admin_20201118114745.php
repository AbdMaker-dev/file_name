<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * attributes={"security"="is_granted('ROLE_ADMIN')"},
 * collectionOperations={"get","post"},
 * itemOperations={"get", "patch", "put", "delete"},
 * normalizationContext={"groups"={"profile_user:read"}},
 * denormalizationContext={"groups"={"profile_user:write"}},
 * )
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
