<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Nomination;

class NominationController extends Controller
{
    public function index(){
        $nominations = Nomination::get();
        foreach($nominations as $nomination){
            $omdbData=[];
            $nomination->movies= json_decode($nomination->movies);
            foreach($nomination->movies as $key=>$movie){
                $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&i=' . $movie;
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                $data = curl_exec($ch);
                curl_close($ch);
                $data = json_decode($data);
                $omdbData[$key] = $data;
            }
            $nomination->movies = $omdbData;
        }
        
        return view('nominations.index',[
            'nominations'=> $nominations
        ]);
    }
    public function show($id){
        
        $nomination = Nomination::where('id', $id)->first();

        $nomination->movies= json_decode($nomination->movies);  
        
        foreach($nomination->movies as $key=>$movie){
            $url = 'http://www.omdbapi.com/?apikey=5bbe12ef&i=' . $movie;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            $data = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($data);
            $omdbData[$key] = $data;
        }

        $nomination->movies = $omdbData;
        return view('nominations.show',[
            'nomination'=> $nomination
        ]);
    }
    public function add(){
        $user_id = 1;
        $movies = Movie::where('user_id', $user_id)->get();

        if(sizeof($movies) != 5){
            session()->flash('error-message', 'You did not add enough movies!');
            return redirect('/movies');
        } 
        $ids = [];

        foreach($movies as $key=>$movie){
            $ids[$key] = $movie->imdbId;
            $movie->delete();
        }

        $ids = json_encode($ids);
        $nomination = new Nomination;
        $nomination->movies = $ids;
        $nomination->save();
        session()->flash('success-message', $nomination->id );
        return redirect('/nominations');
    }
    
    public function delete($id){
        
    }
}
