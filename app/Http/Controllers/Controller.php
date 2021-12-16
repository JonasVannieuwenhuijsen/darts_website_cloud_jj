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
        $client = new Client();
        $url = "http://api.sportradar.us/darts/trial/v2/en/rankings.json?api_key=zwkgpb5hyw7xseb8mpggaxdf";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);

        $topTree = array();
        for ($i=0; $i < 3; $i++) { 
            $player = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["competitor"]["name"];
            array_push($topTree, $player);
        }

        // dd($topTree);

        // dd($responseBody["rankings"]["1"]["competitor_rankings"]["0"]["competitor"]["name"]);

        return view('pdcRanking')->with('topTree', $topTree);
    }


    // test method voor de json uit te lezen in javascript :
    // link: https://stackoverflow.com/questions/67540932/laravel-passing-a-variable-to-js-file-from-a-controller
    public function getRanking()
    {
        $client = new Client();
        $url = "http://api.sportradar.us/darts/trial/v2/en/rankings.json?api_key=zwkgpb5hyw7xseb8mpggaxdf";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);

        $topTree = array();
        for ($i=0; $i < 3; $i++) { 
            $player = $responseBody["rankings"]["1"]["competitor_rankings"][$i]["competitor"]["name"];
            array_push($topTree, $player);
        }
        return $topTree;
    }

    public function play($score)
    {
        $client = new Client();
        $url = "https://checkoutservicenodejs.herokuapp.com/checkout/" . $score;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);
        //dd($topTree);

        dd($responseBody);

        // return view('apitest')->with('topTree', $topTree);
    }

}
