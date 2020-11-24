<?php

namespace App\Http\Controllers;

use App\Movie;
use App\Tempmov;
use Illuminate\Http\Request;

class TempmovController extends Controller
{
    public function index(){
        $user_id = 1; // instead of implementing a log in and a foreign key relation

        $movies = Tempmov::where('user_id', $user_id)->get();
        
        return view('movies',[
            'movies'=>$movies
        ]);
    }

    public function add($id){
        $q = Tempmov::where('imdbId', $id)->get();

        if(sizeof($q)){
            session()->flash('error-message', 'Movie already added!');
            return redirect($_SERVER['HTTP_REFERER']);
        } 

        $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&i=' . $id;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = json_decode(curl_exec($ch));
        curl_close($ch);

        $movie = New Tempmov;
        $movie->imdbId = $id;
        $movie->title = $data->Title;
        $movie->year = $data->Year;
        $movie->poster = $data->Poster;
        $movie->save();

        return redirect($_SERVER['HTTP_REFERER']);

    }

    public function reset(){
        $user_id = 1;
        $movies = Tempmov::where('user_id', $user_id)->get();
        foreach($movies as $movie){
            $movie->delete();
        }
        return redirect('/movies');
    }
    
    public function delete($id){
        $movie = Tempmov::where('imdbId', $id)->first();
        $movie->delete();

        return redirect('/movies');
    }
}
