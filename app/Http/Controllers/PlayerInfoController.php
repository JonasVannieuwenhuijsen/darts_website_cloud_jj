<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerInfoController extends Controller
{
    public function playerInfo() {
        return view('playerInfo');
    }
}
