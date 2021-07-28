<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LanguageUpdateRequest;

class LanguageController extends Controller
{
    /**
     * @param LanguageUpdateRequest $request
     * @return RedirectResponse
     */
    public function change(LanguageUpdateRequest $request): RedirectResponse
    {
        App::setlocale($request->language);
        Session::put('locale', $request->language);

        return Redirect::back();
    }
}
