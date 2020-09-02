<?php

namespace App\Http\Middleware;

use App\News;
use Closure;
use Illuminate\Foundation\Validation\ValidatesRequests;

class NewsValidate
{

    use ValidatesRequests;

    public function handle($request, Closure $next)
    {

        if(!$this->validate($request, News::rules(), [] , News::attrNames())) {
            redirect()->back()->withErrors($this->errors())->withInput();
        }

        return $next($request);
    }
}
