<?php

namespace App\Http\Controllers\Admin;

use App\{News, Resource, Jobs\NewsParsing, Services\XMLParserService};
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        foreach (Resource::all() as $resource) {
            NewsParsing::dispatch($resource->link);
        }
        return redirect()->route('News')->with('success', 'Новости были загружены, обновите страницу!');
    }
}
