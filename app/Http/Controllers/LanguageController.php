<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch application language.
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switch($locale)
    {
        // Define the list of supported languages
        $supportedLocales = ['en', 'sw']; // Add more languages if needed

        // Check if the requested language is supported
        if (in_array($locale, $supportedLocales)) {
            // Save the selected language in the session
            Session::put('locale', $locale);
        } else {
            // If the language is not supported, default to 'en'
            Session::put('locale', 'en');
        }

        // Redirect the user back to the previous page
        return redirect()->back();
    }
}
