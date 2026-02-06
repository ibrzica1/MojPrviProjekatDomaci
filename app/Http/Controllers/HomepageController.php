<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $trenutnoVrijeme = date("H:i:s");
        $trenutniSat = date("H");
        $pozdrav = '';
        $trenutniSat >= 12 ? $pozdrav = "Dobar dan" : $pozdrav = "Dobro jutro";
        return view('welcome', compact('trenutnoVrijeme','trenutniSat','pozdrav'));
    }
}
