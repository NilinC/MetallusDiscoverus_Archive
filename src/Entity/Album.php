<?php

namespace App\Entity;

use \DateTime;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;
    #[ORM\Column(length: 255)]
    private string $title;
    #[ORM\OneToMany(mappedBy: 'album', targetEntity: Image::class)]
    private Collection $images;
    #[ORM\Column(length: 255)]
    private string $artist;
    #[ORM\Column(type: 'date')]
    private DateTime $releaseDate;
    #[ORM\Column]
    private int $totalTracks;
    #[ORM\Column(length: 255)]
    private string $label;
    #[ORM\Column]
    private string $genres;
    #[ORM\Column(type: 'date', nullable: true)]
    private ?DateTime $listenedAt;

    /**
     * @param string $title
     * @param array $images
     * @param string $artist
     * @param DateTime $releaseDate
     * @param int $totalTracks
     * @param string $label
     * @param string $genres
     */
    public function __construct(string $title, Collection $images, string $artist, DateTime $releaseDate, int $totalTracks, string $label, string $genres)
    {
        $this->title = $title;
        $this->images = $images;
        $this->artist = $artist;
        $this->releaseDate = $releaseDate;
        $this->totalTracks = $totalTracks;
        $this->label = $label;
        $this->genres = $genres;
       $this->listenedAt = null;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return Collection
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param Collection $images
     */
    public function setImages(Collection $images): void
    {
        $this->images = $images;
    }


    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     */
    public function setArtist(string $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return DateTime
     */
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param DateTime $releaseDate
     */
    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * @return int
     */
    public function getTotalTracks(): int
    {
        return $this->totalTracks;
    }

    /**
     * @param int $totalTracks
     */
    public function setTotalTracks(int $totalTracks): void
    {
        $this->totalTracks = $totalTracks;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getGenres(): string
    {
        return $this->genres;
    }

    /**
     * @param string $genres
     */
    public function setGenres(string $genres): void
    {
        $this->genres = $genres;
    }

    /**
     * @return ?DateTime
     */
    public function getListenedAt(): ?DateTime
    {
        return $this->listenedAt;
    }

    /**
     * @param ?DateTime $listenedAt
     */
    public function setListenedAt(?DateTime $listenedAt): void
    {
        $this->listenedAt = $listenedAt;
    }
}
