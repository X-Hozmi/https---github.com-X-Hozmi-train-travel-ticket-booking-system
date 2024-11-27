<?php

namespace Src\Presentation\Controllers;

use Src\Presentation\Views\View;

class WebHomeController
{
    public function index(): void
    {
        View::make('home.index')->render();
    }
}
