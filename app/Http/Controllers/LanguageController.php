<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\App;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LanguageUpdateRequest;

class LanguageController extends Controller
{
    /**
     * @param string $language
     * @return RedirectResponse
     */
    public function change(string $language): RedirectResponse
    {
        $languages = array_keys(Config::get('app.languages'));

        if (!Rule::in($languages)) {
            $language = 'en';
        }

        App::setlocale($language);
        Session::put('locale', $language);

        return Redirect::back();
    }
}
