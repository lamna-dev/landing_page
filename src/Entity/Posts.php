<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: PostsRepository::class)]
class Posts
{
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

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'posts')]
    private Collection $categories;

    #[ORM\ManyToMany(targetEntity: Paragraphs::class, inversedBy: 'posts')]
    private Collection $paragraphs;

    #[ORM\Column]
    private ?\DateTimeImmutable $CreatedAt = null;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function setFeaturedImage(string $featuredImage): static
    {
        $this->featuredImage = $featuredImage;

        return $this;
    }

        /**
     * Get the value of featuredImageFile
     */ 
    public function getFeaturedImageFile()
    {
        return $this->featuredImageFile;
    }

    /**
     * Set the value of featuredImageFile
     *
     * @return  self
     */ 
    public function setFeaturedImageFile($featuredImageFile)
    {
        $this->featuredImageFile = $featuredImageFile;

        return $this;
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

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categories $category): static
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, Paragraphs>
     */
    public function getParagraphs(): Collection
    {
        return $this->paragraphs;
    }

    public function addParagraph(Paragraphs $paragraph): static
    {
        if (!$this->paragraphs->contains($paragraph)) {
            $this->paragraphs->add($paragraph);
        }

        return $this;
    }

    public function removeParagraph(Paragraphs $paragraph): static
    {
        $this->paragraphs->removeElement($paragraph);

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): static
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
}
