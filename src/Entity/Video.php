<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */


    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */



/**
 * @Gedmo\Slug(fields={"titre"})
 * @ORM\Column(length=128, nullable=false)
 */
private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $titre;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $lien;



    public function __construct()
    {
        $this->relation = new ArrayCollection();
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

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }


    public function getSlug():?string
    {
        return $this->slug;
    }
    public function setSlug(string $slug):self
    {
        $this->slug=$slug;
        return $this;
    }


}
