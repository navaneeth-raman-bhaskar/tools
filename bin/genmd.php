<?php

/**
 * This file is part of the Rathouz libraries (http://rathouz.cz)
 * Copyright (c) 2016 Tomas Rathouz <trathouz at gmail.com>
 */

require __DIR__ . '/../vendor/autoload.php';

use Rathouz\Tools\Console;


$application = new Console\AssetsApplication();
$application->run();
