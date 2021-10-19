<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 * @Vich\Uploadable
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;





    /**
     * @ORM\Column(type="string", length=500)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $file;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="News")
     */
    private $commentaires;

    /**
     * @Vich\UploadableField(mapping="image_upload", fileNameProperty="file")
     */
    private $imageFile;

    public function setFile(string $file ): self
    {
        $this->file = $file;
        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }



    public function setImageFile(File $file = null)
    {
        $this->imageFile = $file;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }


    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

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


}
