<?php

namespace App\Entity;

use App\Repository\DomaineRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=DomaineRepository::class)
 */
class Domaine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Formation::class, mappedBy="domaine", cascade={"persist", "remove"})
     */
    private $formations;

    /**
     * @ORM\OneToMany(targetEntity=Mention::class, mappedBy="domaine", cascade={"persist", "remove"})
     */
    private $mention;

    public function __construct()
    {
        $this->formations = new ArrayCollection();
        $this->mention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Formation[]
     */
    public function getFormations(): Collection
    {
        return $this->formations;
    }

    public function addFormation(Formation $formation): self
    {
        if (!$this->formations->contains($formation)) {
            $this->formations[] = $formation;
            $formation->setDomaine($this);
        }

        return $this;
    }

    public function removeFormation(Formation $formation): self
    {
        if ($this->formations->removeElement($formation)) {
            // set the owning side to null (unless already changed)
            if ($formation->getDomaine() === $this) {
                $formation->setDomaine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Mention[]
     */
    public function getMention(): Collection
    {
        return $this->mention;
    }

    public function addMention(Mention $mention): self
    {
        if (!$this->mention->contains($mention)) {
            $this->mention[] = $mention;
            $mention->setDomaine($this);
        }

        return $this;
    }

    public function removeMention(Mention $mention): self
    {
        if ($this->mention->removeElement($mention)) {
            // set the owning side to null (unless already changed)
            if ($mention->getDomaine() === $this) {
                $mention->setDomaine(null);
            }
        }

        return $this;
    }
}
