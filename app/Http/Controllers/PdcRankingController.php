<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PdcRankingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pdcRanking()
    {
        return view('pdcRanking');
    }

    // test method voor de json uit te lezen in javascript :
    // link: https://stackoverflow.com/questions/67540932/laravel-passing-a-variable-to-js-file-from-a-controller
    public function getRanking()
    {
        $dartApiKey = "qr2r5bbdksvcfe7qteeq2pwe";
        $client = new Client();
        $url = "http://api.sportradar.us/darts/trial/v2/en/rankings.json?api_key=".$dartApiKey;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);

        dd($responseBody);

        $ranking = array();
        for ($i=0; $i < 183; $i++) { 
            $player = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["competitor"]["name"];
            $prizeMoney = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["prize_money"];
            
            $rankObj = array('player' => $player, 'price_money' => $prizeMoney);
            
            array_push($ranking, $rankObj);
        }
        return $ranking;
    }

    
}
