<?php
declare(strict_types = 1);

use App\Controllers\AboutController;
use App\Controllers\HomeController;


$app->get('', [HomeController::class, 'home']);
$app->get('about', [AboutController::class, 'about']);
