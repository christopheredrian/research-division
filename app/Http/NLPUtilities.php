<?php
/**
 * Created by PhpStorm.
 * User: seand
 * Date: 04/03/2018
 * Time: 8:31 PM
 */

namespace App\Http;


use App\Configuration;
use GuzzleHttp\Client;

class NLPUtilities
{
    /**
     * @param $temp_sentences
     * @return mixed
     */
    public static function getSentiments($temp_sentences){
        $jsonSentences = json_encode(['sentences' => $temp_sentences]);

        $client = new Client();
        $res = $client->post('https://project-lengua.herokuapp.com/api/sentiment/sentences',[
            'form_params' => [
                'sentences' => $jsonSentences
            ]
        ]);

        $sentiments = json_decode($res->getBody()->getContents());

        return $sentiments;
    }

    public static function isNLPEnabled(){
        return (Configuration::where('key', 'is_NLP_enabled')->first()->value === "1" ? true : false );
    }
}