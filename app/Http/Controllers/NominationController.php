<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Tempmov;
use App\Nomination;

class NominationController extends Controller
{
    public function index(){
        $nominations = Nomination::get();
        
        return view('nominations.index',[
            'nominations'=> $nominations
        ]);
    }

    public function show($id){
        
        $nomination = Nomination::where('id', $id)->first();

       
        return view('nominations.show',[
            'nomination'=> $nomination
        ]);
    }

    public function add(){
        $user_id = 1;
        $movies = Tempmov::where('user_id', $user_id)->get();

        if(sizeof($movies) < 5){
            session()->flash('error-message', 'You did not add enough movies!');
            return redirect('/movies');
        } 

        if(sizeof($movies) > 5){
            session()->flash('error-message', 'You have more than 5!');
            return redirect('/movies');
        } 

        $nomination = new Nomination;
        $nomination->save();

        foreach($movies as $movie){
            $saved_movie = New Movie;

            $saved_movie->imdbID = $movie->imdbID;
            $saved_movie->title = $movie->title;
            $saved_movie->year = $movie->year;
            $saved_movie->poster = $movie->poster;
            
            $saved_movie->save();
            $movie->delete();

            $nomination->movies()->attach($saved_movie->id);
        }
        



        session()->flash('success-message', $nomination->id );
        return redirect('/nominations');
    }
    
    public function delete($id){
        
    }
}
