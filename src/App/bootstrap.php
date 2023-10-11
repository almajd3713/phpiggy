<?php
// Creating and loading the application instance 

declare(strict_types = 1);

require __DIR__ . "/../../vendor/autoload.php";

use Framework\App;
use App\Config\Paths;
/**
 * @var App app
 */
$app = new App(Paths::SOURCE . "app/containerDefs.php");
include __DIR__ . "/routes.php";


return $app;