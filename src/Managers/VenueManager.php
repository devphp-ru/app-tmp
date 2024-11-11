<?php

declare(strict_types=1);

namespace App\Managers;

class VenueManager extends BaseManager
{
    private string $queryVenue = 'insert into venue (name, created_at, updated_at) values (?, ?, ?)';
    private string $querySpace = 'insert into space (venue, name, created_at, updated_at) values (?, ?, ?, ?)';
    private string $queryEvent = 'insert into event (space, name, start, duration, created_at, updated_at) values (?, ?, ?, ?, ?, ?)';

    public function addVenue(string $name): array
    {
        $currentDate = date('Y-m-d H:i:s');
        $result['venue'] = [$name, $currentDate, $currentDate];
        $sth = $this->getPdo()->prepare($this->queryVenue);
        $sth->execute($result['venue']);
        $vId = $this->getPdo()->lastInsertId();
        array_unshift($result['venue'], $vId);

        return $result;
    }

    public function addSpace(array $venue, array $spaces): array
    {
        $currentDate = date('Y-m-d H:i:s');
        $sth = $this->getPdo()->prepare($this->querySpace);

        foreach ($spaces as $name) {
            $values = [$venue['venue'][0], $name, $currentDate, $currentDate];
            $sth->execute($values);
            $sId = $this->getPdo()->lastInsertId();
            array_unshift($values, $sId);
            $result['spaces'][] = $values;
        }

        return $result ?? [];
    }

    public function addEvent(int $spaceId, string $name, int $time, int $duration): array
    {
        $currentDate = date('Y-m-d H:i:s');
        $values = [$spaceId, $name, $time, $duration, $currentDate, $currentDate];
        $sth = $this->getPdo()->prepare($this->queryEvent);
        $sth->execute($values);
        $eId = $this->getPdo()->lastInsertId();
        array_unshift($values, $eId);
        $result['events'] = $values;

        return $result;
    }

}
