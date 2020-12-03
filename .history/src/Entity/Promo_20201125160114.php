<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PromoRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;

/**
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 * 
 * @ApiResource(
 * routePrefix="/admin",
 * attributes={"access_control"="is_granted('ROLE_ADMIN')"},
 * 
 * normalizationContext={"groups"={"promo:read"}},
 * denormalizationContext={"groups"={"promo:write"}},
 * 
 * collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "promo_princi"={
 *          "method"="GET",
 *          "path"= "/promo/principal",
 *          "normalization_context"={"groups"={"promo_princi:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *      "promo_appre_attente"={
 *          "method"="GET",
 *          "path"= "/promo/apprenants/attente",
 *          "normalization_context"={"groups"={"promo_appre_attente:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 * },
 * itemOperations={
 *  "get"={"access_control"="is_granted('ROLE_ADMIN') or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *   "promo_id_princi"={
 *          "method"="GET",
 *          "path"= "/promo/{id}/principal",
 *          "normalization_context"={"groups"={"promo_princi:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *   "get_promo_id_ref"={
 *          "method"="GET",
 *          "path"= "/promo/{id}/referentiels",
 *          "normalization_context"={"groups"={"get_promo_id_ref:read"}},
 *          "denormalization_context"={"groups"={"get_promo_id_ref:write"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 * 
 *   "promo_id_appre_attente"={
 *          "method"="GET",
 *          "path"= "/promo/{id}/apprenants/attente",
 *          "normalization_context"={"groups"={"promo_appre_attente:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *  "promo_id_gr_id_appre"={
 *          "method"="GET",
 *          "path"= "/promo/{id}/groupes/{di}/apprenantssssss",
 *          "normalization_context"={"groups"={"promo_id_gr_id_appre:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *  "get_promo_id_form"={
 *          "method"="GET",
 *          "path"= "/promo/{id}/formateurs",
 *          "normalization_context"={"groups"={"get_promo_id_form:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 * 
 * 
 *  "promo_id_ref"={
 *          "method"="PUT",
 *          "path"= "/promo/{id}/referentiels",
 *          "normalization_context"={"groups"={"promo_id_ref:read"}},
 *          "denormalization_context"={"groups"={"promo_id_ref:write"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *  "promo_id_appre"={
 *          "method"="PUT",
 *          "path"= "/promo/{id}/apprenantsssssssss",
 *          "normalization_context"={"groups"={"promo_id_appre:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *  "promo_id_form"={
 *          "method"="PUT",
 *          "path"= "/promo/{id}/formateursssssssss",
 *          "normalization_context"={"groups"={"promo_id_form:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 *  "promo_id_gr_id"={
 *          "method"="PUT",
 *          "path"= "/promo/{id}/groupesggggggg/{di}",
 *          "normalization_context"={"groups"={"promo_id_gr_id:read"}}, 
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_CM') or is_granted('ROLE_FORMATEUR')"
 *      },
 * 
 * },
 * 
 * attributes={"pagination_items_per_page"=10}
 * )
 * @ApiFilter(BooleanFilter::class, properties={"deleted"})
 */
class Promo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"promo:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $langue;

    /**
     * @ORM\Column(type="text")
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $refAgate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $fabrique;

    /**
     * @ORM\Column(type="date")
     * @Groups({"promo:read"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     */
    private $dataFin;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"promo:read", "promo:write"})
     */
    private $avatare;

    /**
     * @ORM\ManyToOne(targetEntity=Referentiel::class, inversedBy="promos")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"promo:read", "promo:write", "promo_id_ref:write"})
     * @ApiSubresource
     */
    private $referentiel;


    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="promo", cascade={"persist"})
     * @Groups({"promo:read"})
     */
    private $groupes;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="promo", cascade={"persist"})
     * @Groups({"promo:read"})
     */
    private $apprenants;

    /**
     * @ORM\ManyToMany(targetEntity=Formateur::class, inversedBy="promos")
     * @Groups({"promo:read"})
     * @ApiSubresource
     */
    private $formateurs;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->formateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getRefAgate(): ?string
    {
        return $this->refAgate;
    }

    public function setRefAgate(string $refAgate): self
    {
        $this->refAgate = $refAgate;

        return $this;
    }

    public function getFabrique(): ?string
    {
        return $this->fabrique;
    }

    public function setFabrique(string $fabrique): self
    {
        $this->fabrique = $fabrique;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDataFin(): ?\DateTimeInterface
    {
        return $this->dataFin;
    }

    public function setDataFin(\DateTimeInterface $dataFin): self
    {
        $this->dataFin = $dataFin;

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

    public function getAvatare()
    {
        return $this->avatare;
    }

    public function setAvatare($avatare): self
    {
        $this->avatare = $avatare;

        return $this;
    }


    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->setPromo($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getPromo() === $this) {
                $groupe->setPromo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Apprenant[]
     */
    public function getApprenants(): Collection
    {
        return $this->apprenants;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenants->contains($apprenant)) {
            $this->apprenants[] = $apprenant;
            $apprenant->setPromo($this);
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->removeElement($apprenant)) {
            // set the owning side to null (unless already changed)
            if ($apprenant->getPromo() === $this) {
                $apprenant->setPromo(null);

                //  suppresion de l'apprenannt des les groupes du promo
                foreach ($this->groupes as $key => $groupe) {
                    $groupe->removeApprenant($apprenant);
                }
            }
        }

        return $this;
    }

    /**
     * @return Collection|Formateur[]
     */
    public function getFormateurs(): Collection
    {
        return $this->formateurs;
    }

    public function addFormateur(Formateur $formateur): self
    {
        if (!$this->formateurs->contains($formateur)) {
            $this->formateurs[] = $formateur;
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): self
    {
        $this->formateurs->removeElement($formateur);

        return $this;
    }

    public function setGroupes(array $objects)
    {
        foreach ($objects as $key => $value) {
            $this->addGroupe($value);
        }

        return $this;
    }

    public function setFormateurs(array $objects)
    {
        foreach ($objects as $key => $value) {
            $this->addFormateur($value);
        }

        return $this;
    }

    public function setApprenants(array $objects)
    {
        foreach ($objects as $key => $value) {
            $this->addApprenant($value);
            $this->getGroupes()[0]->addApprenant($value);
        }
        return $this;
    }


}
