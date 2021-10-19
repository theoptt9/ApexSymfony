<?php

namespace App\Entity;

use App\Repository\WorldRecordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorldRecordRepository::class)
 */
class WorldRecord
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idRecord;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $valeurRecord;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $lienVide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRecord(): ?int
    {
        return $this->idRecord;
    }

    public function setIdRecord(int $idRecord): self
    {
        $this->idRecord = $idRecord;

        return $this;
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

    public function getValeurRecord(): ?string
    {
        return $this->valeurRecord;
    }

    public function setValeurRecord(string $valeurRecord): self
    {
        $this->valeurRecord = $valeurRecord;

        return $this;
    }

    public function getLienVide(): ?string
    {
        return $this->lienVide;
    }

    public function setLienVide(?string $lienVide): self
    {
        $this->lienVide = $lienVide;

        return $this;
    }
}
