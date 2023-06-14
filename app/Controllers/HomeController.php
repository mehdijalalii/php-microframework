<?php

namespace App\Controllers;

use Core\View;

class HomeController
{
    public function __invoke()
    {
        echo View::render('index');
    }
}
