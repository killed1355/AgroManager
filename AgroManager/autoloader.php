<?php

declare(strict_types=1);

/*
 * Точка входа автозагрузки.
 * Соответствие "namespace prefix" => "базовая директория":
 *   AgroManager\...  ->  папка src
 *   Core\...         ->  папка Core
 */

require_once __DIR__ . '/Core/Autoloader.php';

$loader = new \Core\Autoloader();
$loader->addNamespace('AgroManager', __DIR__ . '/src');
$loader->addNamespace('Core', __DIR__ . '/Core');
$loader->register();
