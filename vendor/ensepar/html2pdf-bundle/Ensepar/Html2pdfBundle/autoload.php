<?php

// we need annotation autoloading
$loader = require __DIR__.'/vendor/autoload.php';

Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
