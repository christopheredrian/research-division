<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigurationsController extends Controller
{
    public function index(){
        $configuration = Configuration::where('key', 'is_NLP_enabled')->first();
        return view('admin.configurations.index')
            ->with('configuration', $configuration);
    }

    public function toggleConfiguration() {
        $configuration = Configuration::where('key', 'is_NLP_enabled')->first();
        $configuration->value = (int) $configuration->value === 0 ? '1' : '0';
        $configuration->save();
    }
}
