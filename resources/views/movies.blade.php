@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
<div class="album bg-light">
<div class="container justify-content-center">

@if($movies)
    <div class="container pb-4">
        <h1 class="jumbotron-heading display-4 ">Your favorite movies</h1>
        <p class="h2 lead text-muted">
            Below are the movies you nominated. <br>
            You can choose to save your favorite list when it reaches 5 movies.
        </p>
    </div>
    @if(sizeof($movies)==5)
    <div class="container text-center">
    <p class="alert alert-success">
    You have selected 5 Movies. Time to share!
    </p>
    </div>
    @elseif(sizeof($movies)>5)
    <div class="container text-center">
    <p class="alert alert-danger">
    You have selected more than 5 movies. Remove excess movies to be able to share them!
    </p>
    </div>
    @endif
    <div class="card-columns">
        @foreach($movies as $movie)
                <div class="card">
                    <img src={{$movie->omdbData->Poster}} onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid"/>
                    <div class="card-body">
                    <p>{{$movie->omdbData->Title}} ({{$movie->omdbData->Year}})</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <form method="POST" action="/movies/{{$movie->omdbData->imdbID}}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Remove Nomination</button>
                            </div>
                        </form>
                            
                        </div>
                    </div>
                </div>

        @endforeach
    </div>
    @else
    not found
    @endif
</div>
</div>
</section>
@endsection
