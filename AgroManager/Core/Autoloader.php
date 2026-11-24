<?php

declare(strict_types=1);

namespace Core;

final class Autoloader
{
    private array $prefixes = [];

    public function register(): void
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    public function addNamespace(string $prefix, string $baseDir): void
    {
        $prefix = trim($prefix, '\\') . '\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $this->prefixes[$prefix] = $baseDir;
    }

    public function loadClass(string $class): bool
    {
        foreach ($this->prefixes as $prefix => $baseDir) {
            // необходимо отрезать префикс от полного имени класса
            if (!str_starts_with($class, $prefix)) {
                continue;
            }

            $className = substr($class, strlen($prefix));
            $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

            if ($this->requireFile($file)) {
                return true;
            }
        }

        return false;
    }

    private function requireFile(string $file): bool
    {
        if (is_file($file)) {
            require $file;
            return true;
        }

        return false;
    }
}
