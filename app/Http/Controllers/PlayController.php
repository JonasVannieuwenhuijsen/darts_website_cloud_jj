<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use SoapClient;

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

    public function getCheckouts($score)
    {
        /*
        $client = new Client();
        $url = "https://checkoutservicenodejs.herokuapp.com/checkout/" . $score;

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody(), true);
        //dd($topTree);

        // dd($responseBody);

        return $responseBody;
        */

        /* Soap in laravel
         xampp/php/php.ini uncomment extension=soap
         install: "composer require ricorocks-digital-agency/soap"
         add in file: "use RicorocksDigitalAgency\Soap\Facades\Soap"
         https://github.com/ricorocks-Digital-Agency/soap#installation
        */
        
        $response = Soap::to('https://checkout-soap-docker.herokuapp.com/SOAPDart.asmx?WSDL')->call('getCheckout', ['getal' => $score]);
        $array = json_decode(json_encode($response), TRUE); 
        $responseBody = $array['response'];
        //dd($responseBody);
        return $responseBody;
    }

    public function getAvg($prevAvg, $amountDarts, $thrownScore)
    {
        $response = Soap::to('https://avg3-dart-soap-csharp-docker.herokuapp.com/Average3Dart.asmx')->call('getAverage3DartScore', ['prevAvg' => $prevAvg, 'amountDarts' => $amountDarts, 'thrownScore' => $thrownScore]);
        $array = json_decode(json_encode($response), TRUE); 
        $responseBody = $array['response'];
        //dd($responseBody);
        return $responseBody;
    }
    

}
