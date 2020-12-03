<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BriefRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

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
 */
class Brief
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"brief:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $contexte;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $modalitePedagogique;

    /**
     * @ORM\ManyToOne(targetEntity=Ressource::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $ressource;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $criterePerformance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $modaliteEvaluation;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"brief:read", "brief:write"})
     */
    private $image;

    /**
     * @ORM\Column(type="date")
     * @Groups({"brief:read", "brief:write"})
     */
    private $dateCreation;

    /**
     * @ORM\ManyToOne(targetEntity=Referentiel::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $referentiel;

    /**
     * @ORM\ManyToMany(targetEntity=Niveau::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $niveauCompetences;

    /**
     * @ORM\ManyToMany(targetEntity=Tags::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity=Formateur::class, inversedBy="briefs")
     *  @Groups({"brief:read", "brief:write"})
     */
    private $formateur;

    /**
     * @ORM\ManyToMany(targetEntity=LivrableAttendus::class, inversedBy="briefs")
     *  @Groups({"brief:read", "brief:write"})
     */
    private $livrableAttendus;

    /**
     * @ORM\OneToMany(targetEntity=BriefPromotions::class, mappedBy="brief")
     * @Groups({"brief:read", "brief:write"})
     */
    private $briefPromotions;

    /**
     * @ORM\ManyToOne(targetEntity=EtatBrief::class, inversedBy="briefs")
     * @Groups({"brief:read", "brief:write"})
     */
    private $etatBrief;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"brief:read", "brief:write"})
     */
    private $livrables;

    /**
     * @ORM\OneToMany(targetEntity=EtatBriefGroupes::class, mappedBy="brief")
     * @Groups({"brief:read", "brief:write"})
     */
    private $etatBriefGroupes;

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="briefs")
     * @Groups({"groupe:read", "groupe:write"})
     * @ApiSubre
     */
    private $groupes;

    public function __construct()
    {
        $this->niveauCompetences = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->livrableAttendus = new ArrayCollection();
        $this->briefPromotions = new ArrayCollection();
        $this->etatBriefGroupes = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getImage(): ?bool
    {
        return $this->image;
    }

    public function setImage(bool $image): self
    {
        $this->image = $image;

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

    public function addNiveauCompetence(Niveau $niveauCompetence): self
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

    public function addTag(Tags $tag): self
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
}
