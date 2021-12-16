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


    public function testApi()
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

        return view('apitest')->with('topTree', $topTree);
    }

    public function calcCheckout($score)
    {
        $client = new Client();
        $url = "http://localhost:8080/dartsCounter/resources/javaee8/checkout/" . $score;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);
        //dd($topTree);

        dd($responseBody);

        // return view('apitest')->with('topTree', $topTree);
    }

}
