<?php

namespace Src\Presentation\Controllers;

use Src\Presentation\Views\View;

class WebDashboardController
{
    public function index(): void
    {
        View::make('dashboard.dashboard')->render();
    }
}
