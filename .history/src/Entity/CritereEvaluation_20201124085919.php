<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CritereEvaluationRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CritereEvaluationRepository::class)
 * 
 * @ApiResource(
 * 
 * normalizationContext={"groups"={"cri_eva:read"}},
 * denormalizationContext={"groups"={"cri_eva:write"}},
 * 
 * )
 */
class CritereEvaluation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"cri_ave:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"cri_e:read", "cri_e:write"})
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Referentiel::class, inversedBy="crEvaluation")
     */
    private $referentiel;

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

    public function getReferentiel(): ?Referentiel
    {
        return $this->referentiel;
    }

    public function setReferentiel(?Referentiel $referentiel): self
    {
        $this->referentiel = $referentiel;

        return $this;
    }
}
