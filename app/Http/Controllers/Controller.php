<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function pdcRanking()
    {
        return view('pdcRanking');
    }

    public function play()
    {
        return view('play');
    }


    // test method voor de json uit te lezen in javascript :
    // link: https://stackoverflow.com/questions/67540932/laravel-passing-a-variable-to-js-file-from-a-controller
    public function getRanking()
    {
        $dartApiKey = "4jx6q28jw7xpnkcfhuer4fxn";
        $client = new Client();
        $url = "http://api.sportradar.us/darts/trial/v2/en/rankings.json?api_key=".$dartApiKey;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);

        $ranking = array();
        for ($i=0; $i < 183; $i++) { 
            $player = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["competitor"]["name"];
            $prizeMoney = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["prize_money"];
            
            $rankObj = array('player' => $player, 'price_money' => $prizeMoney);
            
            array_push($ranking, $rankObj);
        }
        return $ranking;
    }

    public function getCheckout($score)
    {
        $client = new Client();
        $url = "https://checkoutservicenodejs.herokuapp.com/checkout/" . $score;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);
        //dd($topTree);

        // dd($responseBody);

        return $responseBody;
    }

}
