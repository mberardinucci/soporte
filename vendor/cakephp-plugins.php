<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'AdminLTE' => $baseDir . '/vendor/maiconpinto/cakephp-adminlte-theme/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Robotusers/Excel' => $baseDir . '/vendor/robotusers/cakephp-excel/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];