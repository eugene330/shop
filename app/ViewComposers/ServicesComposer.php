<?php

namespace App\ViewComposers;

use App\Models\Service;
use Illuminate\View\View;

class ServicesComposer
{
    public function compose(View $view)
    {
        $services = Service::get();
        $view->with('services', $services);
    }
}
