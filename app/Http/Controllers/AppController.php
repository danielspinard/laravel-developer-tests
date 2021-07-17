<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AppController extends Controller
{
    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('app.dashboard');
    }
}
