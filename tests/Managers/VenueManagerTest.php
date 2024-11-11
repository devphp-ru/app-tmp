<?php

declare(strict_types=1);

namespace Managers;

use App\Managers\VenueManager;
use PHPUnit\Framework\TestCase;

class VenueManagerTest extends TestCase
{
    public VenueManager $manager;

    public function setUp(): void
    {
        $this->manager = new VenueManager();
    }

    private function truncateTables(): void
    {
        $sth = $this->manager->getPdo()->prepare('truncate venue');
        $sth->execute();
        $sth = $this->manager->getPdo()->prepare('truncate space');
        $sth->execute();
        $sth = $this->manager->getPdo()->prepare('truncate event');
        $sth->execute();
    }

    public function test_canCreateNewVenue(): array
    {
        $name = 'Дискобар';
        $result = $this->manager->addVenue($name);

        $this->assertSame($name, $result['venue'][1]);

        return $result;
    }

    /**
     * @param array $venue
     * @return array
     * @depends test_canCreateNewVenue
     */
    public function test_canCreateNewSpace(array $venue): array
    {
        $spaces = ['Зал на верху', 'Ночной клуб'];
        $result = $this->manager->addSpace($venue, $spaces);

        $this->assertSame($spaces[0], $result['spaces'][0][2]);
        $this->assertSame($spaces[1], $result['spaces'][1][2]);

        return $result;
    }

    /**
     * @param array $spaces
     * @depends test_canCreateNewSpace
     */
    public function test_canCrateNewEvent(array $spaces): void
    {
        $hour = (60 * 60);
        $day = (24 * $hour);

        $result[] = $this->manager->addEvent((int)$spaces['spaces'][0][0], 'День рождения', time() + $day, ($hour - 5));
        $result[] = $this->manager->addEvent((int)$spaces['spaces'][1][0], 'Продолжения дня рождения', time() + ($day - $hour), $hour);
        $this->truncateTables();

        $this->assertSame('День рождения', $result[0]['events'][2]);
        $this->assertSame('Продолжения дня рождения', $result[1]['events'][2]);
        $this->truncateTables();
    }

}
