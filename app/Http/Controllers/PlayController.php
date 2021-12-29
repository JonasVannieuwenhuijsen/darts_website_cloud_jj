<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PlayController extends Controller
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

    public function play()
    {
        return view('play');
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
