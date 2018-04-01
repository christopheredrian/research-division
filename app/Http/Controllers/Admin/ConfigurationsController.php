<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use Facebook\Exceptions\FacebookResponseException;
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
        $facebook_page_id = Configuration::where('key', 'facebook_page_id')->first();
        $facebook_user_access_token = Configuration::where('key', 'facebook_user_access_token')->first();

        return view('admin.configurations.index', [
            'isChecked' => $configuration->value === "1",
            'facebook_page_id' => $facebook_page_id,
            'facebook_user_access_token' => $facebook_user_access_token
        ]);
    }

    public function updateFacebookVariables(Request $request) {
        $config_facebook_page_id = Configuration::where('key', 'facebook_page_id')->first();
        $config_facebook_user_access_token = Configuration::where('key', 'facebook_user_access_token')->first();
        $config_facebook_forever_page_access_token = Configuration::where('key', 'facebook_forever_page_access_token')->first();
//        dd($config_facebook_user_access_token);

        $new_facebook_page_id = $request->facebook_page_id;
        $new_facebook_user_access_token = $request->facebook_user_access_token;
//        dd($new_facebook_user_access_token);

        if(!($new_facebook_page_id === $config_facebook_page_id->value) ||
            !($new_facebook_user_access_token === $config_facebook_user_access_token->value)){
            try {
                // Get forever page access token
                $fb = app('App\Http\Controllers\Admin\FacebookPostsController')->newFacebookInstance();

                $long_lived_token = $fb->getOAuth2Client()->getLongLivedAccessToken($new_facebook_user_access_token);
                $fb->setDefaultAccessToken($long_lived_token);
                $response = $fb->sendRequest('GET', $new_facebook_page_id, ['fields' => 'access_token'])
                    ->getDecodedBody();

                // Save new forever FB page access token, FB Page ID, and FB USer Access Token
                $config_facebook_forever_page_access_token->value = $response['access_token'];
                $config_facebook_forever_page_access_token->save();

                $config_facebook_page_id->value = $new_facebook_page_id;
                $config_facebook_page_id->save();

                $config_facebook_user_access_token->value = $new_facebook_user_access_token;
                $config_facebook_user_access_token->save();
            } catch (FacebookResponseException $e) {
                Session::flash('flash_message', "Facebook Page ID or User Access Token is inavlid or non-existent!");
                Session::flash('alert-class', 'alert-danger');

                return redirect('/admin/configurations');
            }
        }

        Session::flash('flash_message', "Successfully updated Facebook Page ID!");

        return redirect('/admin/configurations');
    }

    public function toggleConfiguration() {
        $configuration = Configuration::where('key', 'is_NLP_enabled')->first();
        $configuration->value = (int) $configuration->value === 0 ? '1' : '0';
        $configuration->save();

        return $configuration->toJson();
    }
}
