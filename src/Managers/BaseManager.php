<?php

declare(strict_types=1);

namespace App\Managers;

use PDO;
use App\Base\Config;
use App\Base\Registry;
use App\Exceptions\AppException;

abstract class BaseManager
{
    private PDO $pdo;

    public function __construct()
    {
        $registry = Registry::instance();
        $config = new Config();
        $registry->setConfig($config);
        $dsn = $registry->getDsn();

        if (empty($dsn)) {
            throw new AppException('DSN not found.');
        }

        $this->pdo = new PDO($dsn[0], $dsn[1], $dsn[2]);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}
