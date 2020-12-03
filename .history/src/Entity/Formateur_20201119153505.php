<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormateurRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 * @ApiResource(
 * attributes={"security"="is_granted('ROLE_ADMIN')"},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM')"},
 *      "post"={"access_control"="is_granted('ROLE_ADMIN')"},
 * },
 * itemOperations={
 *  "get"={"access_control"="is_granted('ROLE_ADMIN')  or object == user"},
 *  "put"={"access_control"="is_granted('ROLE_ADMIN')  or object == user"}
 * },
 * 
 * normalizationContext={"groups"={"user:read"}},
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 */
class Formateur extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function __construct()
    {
        
    }
    


}
