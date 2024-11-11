<?php
declare(strict_types=1);

if (!function_exists('dd')) {
    function dd(mixed ...$data): void
    {
        print_r($data);
    }
}

if (!function_exists('dump')) {
    function dump(mixed ...$data): void
    {
        var_dump($data);
    }
}
