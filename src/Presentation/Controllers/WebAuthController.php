<?php

namespace Src\Presentation\Controllers;

use Src\Presentation\Views\View;

class WebAuthController
{
    public function indexLogin()
    {
        View::make('auth.login')->render();
    }

    public function indexRegister()
    {
        View::make('auth.register')->render();
    }
}
