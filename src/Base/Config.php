<?php

declare(strict_types=1);

namespace App\Base;

class Config
{
    private array $config;
    private string $pathDb = __DIR__ . '/../../config/db.php';

    public function __construct()
    {
        $this->config['dsn'] = require $this->pathDb;
    }

    public function getDsn(): array
    {
        return $this->config['dsn'];
    }

}
