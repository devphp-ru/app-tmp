<?php

declare(strict_types=1);

namespace App\Base;

class Registry
{
    private static ?Registry $instance = null;
    private ?Config $config;

    private function __construct() {}

    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getConfig(): Config
    {
        if (is_null($this->config)) {
            $this->config = new Config();
        }

        return $this->config;
    }

    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }

    public function getDsn(): array
    {
        return $this->config->getDsn();
    }

}
