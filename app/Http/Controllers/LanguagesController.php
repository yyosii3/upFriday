<?php namespace App\Http\Controllers;

use App\Language;
use App\Http\Requests;
use App\Http\Requests\AddLanguagePairUserRequest;
use App\Http\Controllers\Controller;

use App\LanguagePair;
use App\LanguagePairUser;
use Illuminate\Http\Request;


class LanguagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('auth', ['only' => 'index']);
//        $this->middleware('auth', ['except' => 'index']);
    }

    public function index()
    {
        $languagePairs = [];

        foreach (\Auth::user()->getLanguagePairs() as $languagePairUser) {
            $languages = [];

            foreach ($languagePairUser->languagePair()->getLanguages() as $language) {
                $languages[] = $language->toArray();
            }
            $languages['id'] = $languagePairUser->language_language_id;
            $languagePairs[] = $languages;
        }

        // All languages
        $languages = Language::all()->sortBy('term');
//        $success = 1;

        return view('languages.dashboard', compact('languagePairs', 'languages'));
    }

    /**
     * Show selected language pair and list grades
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $languagePair = LanguagePair::findOrFail($id);

        return view('languages.list', compact('languagePairs', 'languages'));
//        return $languagePair;
    }

    /**
     * Save new language pair and redirect to dashboard
     *
     * @param AddLanguagePairUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(AddLanguagePairUserRequest $request)
    {

        $success                =
        $errors['dublicate']    =
        $errors['same_value']   = false;

        $errorTexts['dublicate']    = "You have got already that language pair. Just take a look on the left side my friend.";
        $errorTexts['same_value']   = "The languages should be different, or was it your intention to learn cards with the same term on each side?";

        foreach (\Auth::user()->getLanguagePairs() as $languagePairUser)
        {
            // TODO: Try if clause through addition and subtraction or multiplication
            if ($languagePairUser->languagePair()->language()->id == $request->language_id AND
                $languagePairUser->languagePair()->related()->id == $request->related_id) {
                $errors['dublicate'] = true;
            }
        }

        /*
         * Check if both languages are not the same
         */

        if ($request->language_id == $request->related_id)
        {
            $errors['same_value'] = true;
        }

        /*
         * Assign errors to view
         */

        $errorsToView = [];

        foreach ($errors as $key => $error)
        {
            if ($error)
            {
                $errorsToView[$key] = $errorTexts[$key];
            }
        }

        /*
         * Add new language pair if not exist
         * Add new language pair to user
         * Add success message
         */

        if(!$errorsToView)
        {
            $languagePair = LanguagePair::where('language_id', $request->language_id)->where('related_id', $request->related_id)->get();

            if(!$languagePair->count())
            {
                $languagePair = new LanguagePair;
                $languagePair->language_id    = $request->language_id;
                $languagePair->related_id     = $request->related_id;
                $languagePair->save();
            }

            if($languagePair->first()->id)
            {
                $languagePairUser = new LanguagePairUser;
                $languagePairUser->language_language_id = $languagePair->first()->id;
                $languagePairUser->user_id              = \Auth::user()->id;

                if($languagePairUser->save())
                {
                    $success = "You have added a new language pair. Just go for it and add new flash cards!";
                }
            }

        }

        /*
         * Finally redirect to the dashboard
         * including all input values and errors
         */
        return redirect('languages')
            ->withInput($request->only(['language_id', 'related_id']))
            ->withErrors($errorsToView)
            ->with('success', $success);
    }
}
