<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 * @ApiResource(
 * attributes={"security"="is_granted('ROLE_ADMIN')"},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')"},
 *      "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 * },
 * itemOperations={
 *  "get"={"access_control"="is_granted('ROLE_ADMIN') and object == user"},
 *  "put",
 *  "delete"
 * },
 * 
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 */
class Apprenant extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ProfileSortie::class, inversedBy="apprenants")
     * 
     */
    private $profilSortie;

    public function __construct()
    {
       
    }

    public function getProfilSortie(): ?ProfileSortie
    {
        return $this->profilSortie;
    }

    public function setProfilSortie(?ProfileSortie $profilSortie): self
    {
        $this->profilSortie = $profilSortie;

        return $this;
    }


}
