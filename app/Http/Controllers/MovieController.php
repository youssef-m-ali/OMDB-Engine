<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::get();
        foreach($movies as $movie){
            $movie->omdbData = json_decode($movie->omdbData);
        }
        
        return view('movies',[
            'movies'=>$movies
        ]);
    }

    public function add($id){

        $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&i=' . $id;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);

        $movie = New Movie;
        $movie->omdbData = $data;
        $movie->save();

        return redirect('/movies');

    }
    
    public function delete($id){
        
    }
}
