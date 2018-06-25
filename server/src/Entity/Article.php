<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraint as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @ORM\Table(name="h8WmKo_article")
 *
 * @ApiResource(
 *     attributes={"access_control"="is_granted('ROLE_USER') or is_granted('ROLE_ADMIN')"},
 *     collectionOperations={
 *         "get"={"method"="GET"},
 *         "post"={"method"="POST", "access_control"="is_granted('ROLE_ADMIN')", "access_control_message"="Only admins can add articles."},
 *     },
 *     itemOperations={
 *         "get"={"method"="GET", "access_control"="is_granted('ROLE_USER')"},
 *         "put"={"method"="PUT", "access_control"="is_granted('ROLE_ADMIN') and object.owner == user"},
 *         "delete"={"method"="DELETE", "access_control"="is_granted('ROLE_ADMIN') and object.owner == user"},
 *     }
 * )
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pusblishedDate;

    public function __construct()
    {
        $this->pusblishedDate = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPusblishedDate(): ?\DateTimeInterface
    {
        return $this->pusblishedDate;
    }

    public function setPusblishedDate(\DateTimeInterface $pusblishedDate): self
    {
        $this->pusblishedDate = $pusblishedDate;

        return $this;
    }
}
