<?php

namespace App\Entity;

use App\Repository\WikiQuiMarcheRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * @ORM\Entity(repositoryClass=WikiQuiMarcheRepository::class)
 * @Vich\Uploadable
 */
class WikiQuiMarche
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="file")
     */
    private $imageFile;



    /**
     * @ORM\Column(type="text")
     */
    private $description;


    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getId(): ?int
    {
        return $this->id;
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



    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setFile(string $file ): self
    {
        $this->file = $file;
        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

}
