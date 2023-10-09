<?php
// Creating and loading the application instance 

declare(strict_types = 1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;

/**
 * @var App app
 */
$app = new App();
include __DIR__ . "/routes.php";


return $app;