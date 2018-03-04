<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ConfigurationsController extends Controller
{
    /**
     * @return $this
     */
    public function index(){
        $configuration = Configuration::where('key', 'is_NLP_enabled')->first();
        return view('admin.configurations.index', [
            'configuration' => $configuration,
            'isChecked' => $configuration->value === "1",
            'configurations' => Configuration::where('key', 'like', 'facebook%')->get()
        ]);
    }

    public function updateFacebookVariables(Request $request) {
        $variables = $request->all() ;
        unset($variables['_token']);
        $variables = $variables['values'];

        foreach ($variables as $key => $value) {
            $configuration = Configuration::findOrFail($key);
            $configuration->value = $value;
            $configuration->save();
        }

        Session::flash('flash_message', "Successfully updated Facebook configuration variables");

        return redirect('/admin/configurations');
    }

    public function toggleConfiguration() {
        $configuration = Configuration::where('key', 'is_NLP_enabled')->first();
        $configuration->value = (int) $configuration->value === 0 ? '1' : '0';
        $configuration->save();

        return $configuration->toJson();
    }

    public function isNLPEnabled(){
        return (Configuration::where('key', 'is_NLP_enabled')->first()->value === "1" ? true : false );
    }
}
