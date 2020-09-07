<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OmdbController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function search(Request $request){

        $formatted = str_replace(' ', '+', $request->movieName);
        $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&s=' . $formatted;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $movies = json_decode($data);

        
        return view('search', [
            'movies' => $movies->Search,
            'movieName' => $request->movieName
        ]);
    }
}
