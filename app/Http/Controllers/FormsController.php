<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Index page for Forms - Listing of all available forms
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('public.forms.index', [
            'questionnaires' => Questionnaire::all(),
            'flag' => \App\Http\Controllers\Admin\FormsController::ALL
        ]);
    }
}
