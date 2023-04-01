<?php

namespace App\Entity;

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
    #[ORM\Column(length: 255)]
    private string $artist;
    #[ORM\Column(length: 255)]
    private string $out;
    #[ORM\Column]
    private int $songsCount;
    #[ORM\Column(length: 255)]
    private string $duration;
    #[ORM\Column(length: 255)]
    private string $label;
    #[ORM\Column]
    private array $songs;

    /**
     * @param int $id
     * @param string $title
     * @param string $artist
     * @param string $out
     * @param int $songsCount
     * @param string $duration
     * @param string $label
     * @param array $songs
     */
    public function __construct(int $id, string $title, string $artist, string $out, int $songsCount, string $duration, string $label, array $songs)
    {
        $this->id = $id;
        $this->title = $title;
        $this->artist = $artist;
        $this->out = $out;
        $this->songsCount = $songsCount;
        $this->duration = $duration;
        $this->label = $label;
        $this->songs = $songs;
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
     * @return string
     */
    public function getOut(): string
    {
        return $this->out;
    }

    /**
     * @param string $out
     */
    public function setOut(string $out): void
    {
        $this->out = $out;
    }

    /**
     * @return int
     */
    public function getSongsCount(): int
    {
        return $this->songsCount;
    }

    /**
     * @param int $songsCount
     */
    public function setSongsCount(int $songsCount): void
    {
        $this->songsCount = $songsCount;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration(string $duration): void
    {
        $this->duration = $duration;
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
     * @return array
     */
    public function getSongs(): array
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    public function setSongs(array $songs): void
    {
        $this->songs = $songs;
    }
}
