<?php

/**
 * This file is part of the Pehape libraries (http://pehape.cz)
 * Copyright (c) 2016 Tomas Rathouz <trathouz at gmail.com>
 */

require __DIR__ . '/../vendor/autoload.php';

use Pehape\Tools\Console;


$application = new Console\AssetsApplication();
$application->run();
