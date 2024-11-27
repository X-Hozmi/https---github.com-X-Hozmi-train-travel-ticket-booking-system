<?php

namespace Src\Application\Middlewares;

use Src\Presentation\Views\View;

class WebAuthMiddleware
{
    public function handle(): bool
    {
        if (! isset($_COOKIE['access_token'])) {
            View::redirect('/');
            return false;
        }
        return true;
    }
}
