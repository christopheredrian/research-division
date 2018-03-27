<?php

namespace App\Http\Controllers;

use App\Ordinance;
use App\Resolution;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');
        // RNR
        $rnr_o = Ordinance::where(function ($query) use ($q) {
            $query->where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%');
        })->where(function ($query) {
            $query->where('is_monitoring', 0);
        })->get();

        $rnr_r = Resolution::where(function ($query) use ($q) {
            $query->where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%');
        })->where(function ($query) {
            $query->where('is_monitoring', 0);
        })->get();

        // M&E
        $mne_o = Ordinance::where(function ($query) use ($q) {
            $query->where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%');
        })->where(function ($query) {
            $query->where('is_monitoring', 1);
        })->get();

        $mne_r = Resolution::where(function ($query) use ($q) {
            $query->where('keywords', 'LIKE', '%' . $q . '%')
                ->orWhere('number', 'LIKE', '%' . $q . '%')
                ->orWhere('series', 'LIKE', '%' . $q . '%')
                ->orWhere('title', 'LIKE', '%' . $q . '%');
        })->where(function ($query) {
            $query->where('is_monitoring', 1);
        })->get();

        $data = [
            'rnr_o' => $rnr_o,
            'rnr_r' => $rnr_r,
            'mne_o' => $mne_o,
            'mne_r' => $mne_r
        ];
        if ($request->is('*admin*')) {
            return view('search.admin', $data);
        } else{
            return view('search.public', $data);
        }
    }
}
