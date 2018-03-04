<?php

namespace App\Http\Controllers\Admin;

use App\Configuration;
use App\Ordinance;
use Facebook\Facebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacebookPostsController extends Controller
{
    public function newFacebookInstance(){
        $fb = new Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => env('FACEBOOK_DEFAULT_GRAPH_VERSION')
        ]);
        $fb->setDefaultAccessToken(env('FACEBOOK_FOREVER_PAGE_ACCESS_TOKEN'));

        return $fb;
    }

    public function getMessage($legislation){
        $legislationType = get_class($legislation) == 'App\\Ordinance' ? 'Ordinance' : 'Resolution';
        $fbMessage = '';

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

        if (env('APP_ENV') === 'local') {
            // For development purposes
            $fbMessage .= 'http://localhost:8000/public/show' . $legislationType . '/' . $legislation->id;
        }

        return $fbMessage;
    }

    public function postToPage($legislation){
        $legislationType = get_class($legislation) == 'App\\Ordinance' ? 'Ordinance' : 'Resolution';
        $link = 'https://research-division-baguio.herokuapp.com/public/show' . $legislationType . '/' . $legislation->id;

        // Filter message if legislation is for monitoring or dissemination
        $fbMessage = $this->getMessage($legislation);
        $array = env('APP_ENV') === 'local' ? ['message' => $fbMessage] : ['message' => $fbMessage, 'link' => $link];

        // Create new Facebook instance
        $fb = $this->newFacebookInstance();

        // Get Facebook page ID from saved configurations in database
        $facebookPageID = Configuration::where('key', 'facebook_page_id')->first()->value;

        $legislation->facebook_post_id = $fb->sendRequest(
            'POST',
            $facebookPageID . "/feed",
            $array)
            ->getDecodedBody()['id'];

        $legislation->save();
    }

    public function getComments($legislation){
        // GET FACEBOOK COMMENTS OF FACEBOOK POST IF M&E ORDINANCE
        if($legislation->is_monitoring === 1 and $legislation->facebook_post_id !== null) {
            try {
                // Create new Facebook instance
                $fb = $this->newFacebookInstance();

                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->get(
                    ('/' . $legislation->facebook_post_id . '/comments')
                );

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
