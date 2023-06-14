<?php

namespace App;

use Core\Queue;
use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\RegisterController;

Router::addRoute('/', [HomeController::class]);
Router::addRoute('/register', [RegisterController::class]);
Router::addRoute('/worker', [Queue::class, 'process']);
