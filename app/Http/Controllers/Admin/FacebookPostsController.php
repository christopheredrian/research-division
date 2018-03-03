<?php

namespace App\Http\Controllers\Admin;

use App\Ordinance;
use Facebook\Facebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacebookPostsController extends Controller
{
    public function postToPage($legislation){
        $legislationType = get_class($legislation) == 'App\\Ordinance' ? 'Ordinance' : 'Resolution';
        $fbMessage = '';

        $fb = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION')
        ]);
        $fb->setDefaultAccessToken(env('FACEBOOK_FOREVER_PAGE_ACCESS_TOKEN'));

        // Filter message if legislation is for monitoring or dissemination
        if($legislation->is_monitoring === 1) {
            $fbMessage .= 'Good day! A new ' . $legislationType . ' is being monitored!';
        } else {
            $legislationAction = $legislationType === 'Ordinance' ? 'enacted' : 'approved';

            $fbMessage .= 'Good day! A new ' . $legislationType . ' has been ' . $legislationAction . '!';
        }

        $fbMessage .= "\r\n\r\n";
        $fbMessage .= $legislationType . ' ' . $legislation->number . ' Series of ' . $legislation->series;
        $fbMessage .= "\r\n";
        $fbMessage .= $legislation->title;
        $fbMessage .= "\r\n\r\n";
        $fbMessage .= 'Click on the link below to read more about this ' . $legislationType;
        $fbMessage .= "\r\n";

        // TEMPORARY, for development purposes
        $fbMessage .= 'http://localhost:8000/public/show' . $legislationType . '/' . $legislation->id;

        // For PRODUCTION
        // $link = 'https://research-division-baguio.herokuapp.com/public/show' . $legislationType . '/' . $legislation->id;


        $legislation->facebook_post_id = $fb->sendRequest('POST', env('FACEBOOK_PAGE_ID') . "/feed", [
            'message' => $fbMessage,
//            'link' => $link,
        ])->getDecodedBody()['id'];

        $legislation->save();
    }

    public function getComments($legislation){
        // GET FACEBOOK COMMENTS OF FACEBOOK POST IF M&E ORDINANCE
        if($legislation->is_monitoring === 1 and $legislation->facebook_post_id !== null) {
            try {
                $fb = new Facebook([
                    'app_id' => env('FACEBOOK_APP_ID'),
                    'app_secret' => env('FACEBOOK_APP_SECRET'),
                    'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION')
                ]);
                $fb->setDefaultAccessToken(env('FACEBOOK_FOREVER_PAGE_ACCESS_TOKEN'));

                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->get(
                    ('/' . $legislation->facebook_post_id . '/comments')
                );

//                dd($response->getDecodedBody()['data']);
                return $response->getDecodedBody()['data'];
            } catch(Exception $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }
        } else {
            return array();
        }
    }
}
