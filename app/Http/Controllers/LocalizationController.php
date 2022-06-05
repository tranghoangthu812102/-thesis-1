<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLanguage($language)
    {
        $lang = $request->language;
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        Session::put('language', $language);
        return redirect()->back();
    }
}
