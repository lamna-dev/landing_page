<?php

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\Traits\TimeStampable;


#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: PostsRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Posts
{
    use TimeStampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255)]
    private ?string $featuredImage = null;  

    #[Vich\UploadableField(mapping: 'posts', fileNameProperty: 'featuredImage')]
    private ?File $featuredImageFile = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users = null;

    #[ORM\ManyToOne(targetEntity: Categories::class, inversedBy: 'posts')]
    private Categories $categories;

    #[ORM\OneToMany(targetEntity: Posts::class, mappedBy: 'paragraphs')]
    private Collection $paragraphs;

    public function __construct()
    {
        $this->paragraphs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getFeaturedImage(): ?string
    {
        return $this->featuredImage;
    }

    public function setFeaturedImage(?string $featuredImage): static
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

    public function getFeaturedImageFile()
    {
        return $this->featuredImageFile;
    }

    public function setFeaturedImageFile($featuredImageFile)
    {
        $this->featuredImageFile = $featuredImageFile;
    }
    
    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function __toString()
    {
        return $this->title;    
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getParagraphs(): Collection
    {
        return $this->paragraphs;
    }  

    public function addPost(Paragraphs $paragraph): static
    {
        if (!$this->paragraphs->contains($paragraph)) {
            $this->paragraphs->add($paragraph);
        }

        return $this;
    }

    public function removePost(Paragraphs $paragraph): static
    {
        $this->paragraphs->removeElement($paragraph);

        return $this;
    }

}
