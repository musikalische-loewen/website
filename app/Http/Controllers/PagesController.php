<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $path = str_replace('/', '.', $request->path);
        $view_a = sprintf('pages.%s', $path);
        $view_b = sprintf('pages.%s.index', $path);
        if (view()->exists($view_a)) {
            return view($view_a);
        }
        if (view()->exists($view_b)) {
            return view($view_b);
        }
        abort(404);
    }
}
