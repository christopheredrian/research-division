<?php

namespace App\Http\Controllers\Admin;

use App\Response;
use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ordinance;
use App\Resolution;
use Carbon;
class DashboardController extends Controller
{
    /**
     * Index page for the admin view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $suggestions = Suggestion::Where('created_at','>', Carbon\Carbon::now()->subDays(4))->get();
        $responses = Response::Where('created_at','>', Carbon\Carbon::now()->subDays(4))->get();
        return view('admin.dashboard.index')->with('suggestions', $suggestions)->with('responses', $responses);
    }
}
