<?php

namespace App\Http\Controllers;

use App\DeBeers\Entities\Item;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getViewData(): array
    {
        $version = trim(shell_exec('git rev-parse --short HEAD'));
        $routes = [];

        foreach (app()->routes->getRoutes() as $route) {
            $name = $route->getName();

            if (!is_null($name)) {
                $routes[$name] = "/{$route->uri}";
            }
        }

        return compact('routes', 'version');
    }
}
