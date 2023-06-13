<?php

namespace App\Domain;

use DateTime;

class Album
{
    private ?DateTime $listenedAt = null;

    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly array $images,
        private readonly string $artist,
        private readonly string $releaseDate,
        private readonly int $totalTracks,
        private readonly string $label,
        private readonly string $genres
    ) {
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
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->releaseDate;
    }

    /**
     * @return int
     */
    public function getTotalTracks(): int
    {
        return $this->totalTracks;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getGenres(): string
    {
        return $this->genres;
    }

    /**
     * @return DateTime|null
     */
    public function getListenedAt(): ?DateTime
    {
        return $this->listenedAt;
    }

    /**
     * @param string|null $listenedAt
     */
    public function setListenedAt(?string $listenedAt): void
    {
        if (null === $listenedAt) {
            $this->listenedAt = null;
        } else {
            $this->listenedAt = DateTime::createFromFormat('d-m-Y', $listenedAt);
        }
    }
}
