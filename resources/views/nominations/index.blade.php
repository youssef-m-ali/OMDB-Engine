@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
    @if(session()->has('success-message'))
        <div class="container text-center">
            <p class="alert alert-success">
            You have created nominations list #{{session()->get('success-message')}} <br>
            You can share your list using <a class="alert-link" href="/nominations/{{session()->get('success-message')}}">this link</a>
            </p>
            
        </div>
    @endif
    <div class="container">
        <h1 class="jumbotron-heading display-4 ">View OMDB Nominations</h1>
        <p class="h2 lead text-muted">
            The lists below are the favourite movies of other users <br>
        </p>
    </div>
<div class="album bg-light">
<div class="container justify-content-center">

<div class="row">
        @foreach($nominations as $nomination)
        <div class="col-md-12 col-lg-6 py-2">
                <div class="card">
                    <div class="card-header h4">
                        Nomination list # {{$nomination->id}}
                    </div>
                    <div class="card-body">
                    <ul>

                    @foreach($nomination->movies as $movie)
                        <li class="text-left">
                        <a href="https://www.imdb.com/title/{{$movie->imdbID}}" class="text-dark">{{$movie->title}} ({{$movie->year}})</a>
                        </li>
                    @endforeach
                    </ul>
                    
                    </div>
                    <div class="card-footer bg-white text-left">
                    <a href="/nominations/{{$nomination->id}}" class="btn btn-info">View</a>
                    </div>
                </div>
        </div>
                
        @endforeach
    </div>
    </div>
</div>
</section>
@endsection