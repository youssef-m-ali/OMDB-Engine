<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Nomination;

class NominationController extends Controller
{
    public function index(){
        $nominations = Nomination::get();
        return view('nominations.index',[
            'nominations', $nominations
        ]);
    }
    public function show(Nomination $nomination){
        
        return view('nominations.show',[
            'nomination', $nomination
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
    }
    
    public function delete($id){
        
    }
}
