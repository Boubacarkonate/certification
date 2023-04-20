<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $administratif = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $aide_conseil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $educatif = null;

    #[ORM\OneToOne(mappedBy: 'category', cascade: ['persist', 'remove'])]
    private ?Cv $cv = null;

    #[ORM\OneToOne(mappedBy: 'category', cascade: ['persist', 'remove'])]
    private ?Annonce $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdministratif(): ?string
    {
        return $this->administratif;
    }

    public function setAdministratif(?string $administratif): self
    {
        $this->administratif = $administratif;

        return $this;
    }

    public function getAideConseil(): ?string
    {
        return $this->aide_conseil;
    }

    public function setAideConseil(?string $aide_conseil): self
    {
        $this->aide_conseil = $aide_conseil;

        return $this;
    }

    public function getEducatif(): ?string
    {
        return $this->educatif;
    }

    public function setEducatif(?string $educatif): self
    {
        $this->educatif = $educatif;

        return $this;
    }

    public function getCv(): ?Cv
    {
        return $this->cv;
    }

    public function setCv(Cv $cv): self
    {
        // set the owning side of the relation if necessary
        if ($cv->getCategory() !== $this) {
            $cv->setCategory($this);
        }

        $this->cv = $cv;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        // unset the owning side of the relation if necessary
        if ($annonce === null && $this->annonce !== null) {
            $this->annonce->setCategory(null);
        }

        // set the owning side of the relation if necessary
        if ($annonce !== null && $annonce->getCategory() !== $this) {
            $annonce->setCategory($this);
        }

        $this->annonce = $annonce;

        return $this;
    }
}
