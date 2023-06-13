<?php

namespace Domain;

use App\Domain\Album;
use PHPUnit\Framework\TestCase;

class testAlbum extends TestCase
{
    public function testNewAlbumIsCorrectlyInitialized(): void
    {
        $album = $this->createAlbumMock(
            1,
            'The Way of all Flesh',
            [],
            'Gojira',
            '13-10-2008',
            12,
            'Listenable Records',
            'Technical Death Metal'
        );

        $this->assertSame(1, $album->getId());
        $this->assertSame("The Way of all Flesh", $album->getTitle());
        $this->assertSame([], $album->getImages());
        $this->assertSame("Gojira", $album->getArtist());
        $this->assertSame("13-10-2008", $album->getReleaseDate());
        $this->assertSame(12, $album->getTotalTracks());
        $this->assertSame("Listenable Records", $album->getLabel());
        $this->assertSame("Technical Death Metal", $album->getGenres());
    }

    public function testAlbumHasNoListenedAtByDefault(): void
    {
        $album = $this->createAlbumMock();

        $this->assertNull($album->getListenedAt());
    }

    public function testListenedAtCanBeUpdatedToADate(): void
    {
        $album = $this->createAlbumMock();
        $album->setListenedAt('13-06-2023');

        $this->assertEquals('13-06-2023', $album->getListenedAt()->format('d-m-Y'));
    }

    public function testListenedAtCanBeUpdatedToNoDate(): void
    {
        $album = $this->createAlbumMock();
        $album->setListenedAt('13-06-2023');
        $album->setListenedAt(null);

        $this->assertSame(null, $album->getListenedAt());
    }

    protected function createAlbumMock(
        int $id = 1,
        string $title = 'The Way of all Flesh',
        array $images = [],
        string $artist = 'Gojira',
        string $releaseDate = '13-10-2008',
        int $totalTracks = 12,
        string $label = 'Listenable Records',
        string $genres = 'Technical Death Metal'
    ): Album
    {
        return new Album($id, $title, $images, $artist, $releaseDate, $totalTracks, $label, $genres);
    }
}
