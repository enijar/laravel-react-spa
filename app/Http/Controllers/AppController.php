<?php

namespace App\Http\Controllers;

use App\App\Optimize\CollapseWhitespace;
use Illuminate\Support\Facades\Cache;

class AppController extends Controller
{
    public function app()
    {
        if (env('APP_ENV') === 'local') {
            return view('app', $this->getViewData());
        }

        return Cache::remember('view.app', 525600, function () {
            $html = view('app', $this->getViewData())->render();
            $html = CollapseWhitespace::get($html);
            return $html;
        });
    }
}
