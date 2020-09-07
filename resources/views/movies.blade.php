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
            You can choose to save your favorite list when it reaches 5 movies. <br>
            You can also reset
        </p>
    </div>
    <div class="card-columns">
        @foreach($movies as $movie)

                <div class="card">
                    <img src={{$movie->omdbData->Poster}} onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid"/>
                    <div class="card-body">
                    <p>{{$movie->omdbData->Title}} ({{$movie->omdbData->Year}})</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" href="/movies/{{$movie->imdbID}}" class="btn btn-sm btn-outline-success">Nominate</a>
                            </div>
                        <small class="text-muted"></small>
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