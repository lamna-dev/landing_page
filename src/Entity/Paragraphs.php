<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\TimeStampable;
use App\Repository\ParagraphsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: ParagraphsRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Paragraphs
{

    use TimeStampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $featuredImage = null;

    #[Vich\UploadableField(mapping: 'paragraphs', fileNameProperty: 'featuredImage')]
    private ?File $featuredImageFile = null;

    #[ORM\ManyToOne(targetEntity: Posts::class, inversedBy: 'paragraphs')]
    private Posts $post;

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

        return $this;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function setPost($post): self
    {
        $this->post = $post;

        return $this;
    }
}
