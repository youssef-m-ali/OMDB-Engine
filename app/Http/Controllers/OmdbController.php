<?php

namespace App\Http\Controllers;

use App\Tempmov;
use Illuminate\Http\Request;

class OmdbController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function search(Request $request){
        
        $formatted = str_replace(' ', '+', $request->movieName);
        $allMovies = '';
        $endOfResults = false;

        $user_id = 1;
        $nominated = sizeof(Tempmov::where('user_id', $user_id)->get());


        for ($p = 1; $p<=$request->page; $p++){
            $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&type=movie&page=' . $p . '&s=' . $formatted;
           
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($data);
            if ($data->Response != "False"){
                $movies = $data->Search;
                foreach ($movies as $movie){
                    $q = Tempmov::where('imdbId', $movie->imdbID)->get();

                    if(sizeof($q)){
                        $movie->selected = true;
                    } else {
                        $movie->selected = false;
                    }
                }

                if ($allMovies){
                    $allMovies = array_merge($allMovies, $movies);
                } else {
                    $allMovies = $movies;
                }
            } else {
                $endOfResults = true; //differentiate end from no movies
            }
        }
        return view('search', [
            'movies' => $allMovies,
            'movieName' => $request->movieName,
            'page'=> $request->page,
            'endOfResults'=> $endOfResults,
            'nominated'=> $nominated
        ]);
    }
}
