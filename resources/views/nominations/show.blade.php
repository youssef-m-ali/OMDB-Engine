@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
<div class="album bg-light">
<div class="container justify-content-center">
    <div class="container pb-4">
        <h1 class="jumbotron-heading display-4 ">Nomination list number {{$nomination->id}}</h1>
        <p class="h2 lead text-muted">
            Below are the nominated movies. <br>
            This list was submitted on {{$nomination->created_at}}
        </p>
    </div>


    <div class="card-columns">
        @foreach($nomination->movies as $movie)
                <div class="card">
                    <img src="{{$movie->poster}}" onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid"/>
                    <div class="card-body">
                        <p>{{$movie->title}} - {{$movie->year}}</p>
                        <div class="">
                        <a href="https://www.imdb.com/title/{{$movie->imdbID}}" class="btn btn-primary">Check on IMBd</a>
                        
                        </div>
                    </div>
                </div>
        @endforeach
    </div>


</div>
</div>
</section>
@endsection
