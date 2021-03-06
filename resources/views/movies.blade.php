@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
<div class="album bg-light">
<div class="container justify-content-center">
    <div class="container pb-4">
        <h1 class="jumbotron-heading display-4 ">Your favourite movies</h1>
        <p class="h2 lead text-muted">
            Below are the movies you nominated. <br>
            You can choose to save your favourite list when it reaches 5 movies.
        </p>
    </div>

    @if(session()->has('error-message'))
        <div class="container text-center">
            <p class="alert alert-danger">
            {{session()->get('error-message')}}
            </p>
            
        </div>
    @endif

@if(sizeof($movies))

    @if( sizeof($movies) == 5)
        <div class="container text-center">
            <p class="alert alert-success ">
                You have selected 5 Movies. Time to share!
            </p>
        </div>

    @elseif( sizeof($movies) > 5)
        <div class="container text-center">
            <p class="alert alert-danger">
                You have selected more than 5 movies. Remove excess movies to be able to share them!
            </p>
        </div>
    @endif
    <div class="container py-3">
        
    @if(sizeof($movies)==5)
    <a class="btn btn-success px-3" href="/nominations/add">Save List</a>
    @endif

    <a class="btn btn-secondary px-3" href="/movies/reset">Reset Selection</a>
    </div>

    <div class="card-columns">
        @foreach($movies as $movie)
                <div class="card">
                    <img src="{{$movie->poster}}" onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid"/>
                    <div class="card-body">
                        <p>{{$movie->title}} - {{$movie->year}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <form method="POST" action="/movies/{{$movie->imdbID}}">
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
<div class="container text-center">
    <p class="alert alert-secondary ">
        You have no selected movies at this time. click <a href="/" class="alert-link">here</a> to start your search
    </p>
</div>
@endif

</div>
</div>
</section>
@endsection
