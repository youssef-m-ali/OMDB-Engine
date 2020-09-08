<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $user_id = 1; // instead of implementing a log in and a foreign key relation
        $movies = Movie::where('user_id', $user_id)->get();

        foreach($movies as $movie){
            $movie->omdbData = json_decode($movie->omdbData);
        }
        
        return view('movies',[
            'movies'=>$movies
        ]);
    }

    public function add($id){
        $q = Movie::where('imdbId', $id)->get();
        if(sizeof($q)){
            session()->flash('error-message', 'Movie already added!');
            return redirect($_SERVER['HTTP_REFERER']);
        } 

        $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&i=' . $id;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);

        $movie = New Movie;
        $movie->omdbData = $data;
        $movie->imdbId = $id;
        $movie->save();

        return redirect('/movies');

    }
    
    public function delete($id){
        $movie = Movie::where('imdbId', $id)->first();
        $movie->delete();

        return redirect('/movies');
    }
}
