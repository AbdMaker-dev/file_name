<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BriefRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=BriefRepository::class)
 * @ApiResource(
 *      routePrefix="/formateur",
 *      attributes={"access_control"="is_granted('ROLE_ADMIN')  or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 * 
 *      normalizationContext={"groups"={"brief:read"}},
 *      denormalizationContext={"groups"={"brief:write"}},
 * 
 *      collectionOperations={
 *      "get"={"access_control"="is_granted('ROLE_ADMIN')  or is_granted('ROLE_FORMATEUR') or is_granted('ROLE_CM')"},
 *      "post"
 * },
 * )
*  @ApiFilter(BooleanFilter::class, properties={"deleted"})
 * @UniqueEntity(
 *     fields={"titre"},
 *     message="titre de ce  Brief existe"
 * )
 */
class Brief
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"brief:read", "groupe_briefs:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "langue du Brief aubligatoire")
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "titre du Brief aubligatoire")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "descrition du Brief aubligatoire")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "context du Brief aubligatoire")
     */
    private $contexte;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "modalite pedagogique du Brief aubligatoire")
     */
    private $modalitePedagogique;

    /**
     * @ORM\ManyToOne(targetEntity=Ressource::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     */
    private $ressource;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "critere de performance du Brief aubligatoire")
     */
    private $criterePerformance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "modalite d'evaluation du Brief aubligatoire")
     */
    private $modaliteEvaluation;

    /**
     * @ORM\Column(type="date")
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * @Assert\NotNull(message = "date de creation  du Brief aubligatoire")
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity=Referentiel::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     * 
     */
    private $referentiel;

    /**
     * @ORM\ManyToMany(targetEntity=Niveau::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write"})
     */
    private $niveauCompetences;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity=Formateur::class, inversedBy="briefs", cascade={"persist"})
     *  @Groups({"brief:read", "brief:write", "groupe_briefs:read"})
     */
    private $formateur;

    /**
     * @ORM\ManyToMany(targetEntity=LivrableAttendus::class, inversedBy="briefs", cascade={"persist"})
     *  @Groups({"brief:read", "groupe_briefs:read", "brief:write"})
     */
    private $livrableAttendus;

    /**
     * @ORM\OneToMany(targetEntity=BriefPromotions::class, mappedBy="brief", cascade={"persist"})
     * @Groups({"brief:read", "brief:write"})
     * @ApiSubresource
     */
    private $briefPromotions;

    /**
     * @ORM\ManyToOne(targetEntity=EtatBrief::class, inversedBy="briefs", cascade={"persist"})
     * @Groups({"brief:read", "brief:write"})
     */
    private $etatBrief;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $livrables;

    /**
     * @ORM\OneToMany(targetEntity=EtatBriefGroupes::class, mappedBy="brief", cascade={"persist"})
     * @Groups({"brief:read", "brief:write"})
     */
    private $etatBriefGroupes;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="briefs", cascade={"persist"})
     * @Groups({"groupe:read", "groupe:write"})
     * @ApiSubresource
     */
    private $groupes;

    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, mappedBy="briefs", cascade={"persist"})
     */
    private $promos;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Groups({"brief:read", "brief:write"})
     */
    private $image;

    public function __construct()
    {
        $this->niveauCompetences = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->livrableAttendus = new ArrayCollection();
        $this->briefPromotions = new ArrayCollection();
        $this->etatBriefGroupes = new ArrayCollection();
        $this->groupes = new ArrayCollection();
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): ?self
    {
        $this->id = $id;
        return $this;
    }

    public function getLangue(): ?Langue
    {
        return $this->langue;
    }

    public function setLangue(?Langue $langue): self
    {
        $this->langue = $langue;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContexte(): ?string
    {
        return $this->contexte;
    }

    public function setContexte(string $contexte): self
    {
        $this->contexte = $contexte;

        return $this;
    }

    public function getModalitePedagogique(): ?string
    {
        return $this->modalitePedagogique;
    }

    public function setModalitePedagogique(string $modalitePedagogique): self
    {
        $this->modalitePedagogique = $modalitePedagogique;

        return $this;
    }

    public function getRessource(): ?Ressource
    {
        return $this->ressource;
    }

    public function setRessource(?Ressource $ressource): self
    {
        $this->ressource = $ressource;

        return $this;
    }

    public function getCriterePerformance(): ?string
    {
        return $this->criterePerformance;
    }

    public function setCriterePerformance(string $criterePerformance): self
    {
        $this->criterePerformance = $criterePerformance;

        return $this;
    }

    public function getModaliteEvaluation(): ?string
    {
        return $this->modaliteEvaluation;
    }

    public function setModaliteEvaluation(string $modaliteEvaluation): self
    {
        $this->modaliteEvaluation = $modaliteEvaluation;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

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

    /**
     * @return Collection|Niveau[]
     */
    public function getNiveauCompetences(): Collection
    {
        return $this->niveauCompetences;
    }

    public function addNiveauCompetences(Niveau $niveauCompetence): self
    {
        if (!$this->niveauCompetences->contains($niveauCompetence)) {
            $this->niveauCompetences[] = $niveauCompetence;
        }

        return $this;
    }

    public function removeNiveauCompetence(Niveau $niveauCompetence): self
    {
        $this->niveauCompetences->removeElement($niveauCompetence);

        return $this;
    }

    /**
     * @return Collection|Tags[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTags(Tags $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tags $tag): self
    {
        $this->tags->removeElement($tag);

        return $this;
    }

    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): self
    {
        $this->formateur = $formateur;

        return $this;
    }

    /**
     * @return Collection|LivrableAttendus[]
     */
    public function getLivrableAttendus(): Collection
    {
        return $this->livrableAttendus;
    }

    public function addLivrableAttendu(LivrableAttendus $livrableAttendu): self
    {
        if (!$this->livrableAttendus->contains($livrableAttendu)) {
            $this->livrableAttendus[] = $livrableAttendu;
        }

        return $this;
    }

    public function removeLivrableAttendu(LivrableAttendus $livrableAttendu): self
    {
        $this->livrableAttendus->removeElement($livrableAttendu);

        return $this;
    }

    /**
     * @return Collection|BriefPromotions[]
     */
    public function getBriefPromotions(): Collection
    {
        return $this->briefPromotions;
    }

    public function addBriefPromotion(BriefPromotions $briefPromotion): self
    {
        if (!$this->briefPromotions->contains($briefPromotion)) {
            $this->briefPromotions[] = $briefPromotion;
            $briefPromotion->setBrief($this);
        }

        return $this;
    }

    public function removeBriefPromotion(BriefPromotions $briefPromotion): self
    {
        if ($this->briefPromotions->removeElement($briefPromotion)) {
            // set the owning side to null (unless already changed)
            if ($briefPromotion->getBrief() === $this) {
                $briefPromotion->setBrief(null);
            }
        }

        return $this;
    }

    public function getEtatBrief(): ?EtatBrief
    {
        return $this->etatBrief;
    }

    public function setEtatBrief(?EtatBrief $etatBrief): self
    {
        $this->etatBrief = $etatBrief;

        return $this;
    }

    public function getLivrables(): ?string
    {
        return $this->livrables;
    }

    public function setLivrables(string $livrables): self
    {
        $this->livrables = $livrables;

        return $this;
    }

    /**
     * @return Collection|EtatBriefGroupes[]
     */
    public function getEtatBriefGroupes(): Collection
    {
        return $this->etatBriefGroupes;
    }

    public function addEtatBriefGroupe(EtatBriefGroupes $etatBriefGroupe): self
    {
        if (!$this->etatBriefGroupes->contains($etatBriefGroupe)) {
            $this->etatBriefGroupes[] = $etatBriefGroupe;
            $etatBriefGroupe->setBrief($this);
        }

        return $this;
    }

    public function removeEtatBriefGroupe(EtatBriefGroupes $etatBriefGroupe): self
    {
        if ($this->etatBriefGroupes->removeElement($etatBriefGroupe)) {
            // set the owning side to null (unless already changed)
            if ($etatBriefGroupe->getBrief() === $this) {
                $etatBriefGroupe->setBrief(null);
            }
        }

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
            $groupe->addBrief($this);
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->groupes->removeElement($groupe)) {
            $groupe->removeBrief($this);
        }

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->addBrief($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->removeElement($promo)) {
            $promo->removeBrief($this);
        }

        return $this;
    }

    public function getImage()
    {
        return $this->image!=null?stream_get_contents($this->image):null;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }
}
