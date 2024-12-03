<?php

namespace Src\Presentation\Controllers;

use Src\Presentation\Views\View;

class WebTicketController
{
    public function index(): void
    {
        View::make('reservation.ticket')->render();
    }
}
