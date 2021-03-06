@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">


<div class="album bg-light">
<div class="container justify-content-center">
    <form method="GET" action="/search" class="py-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="movieName" id="movieName" value="{{$movieName}}">
            <input type="hidden" id="page" name="page" value="1">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Search OMDb</button>
                </div>
        </div>
    </form>
    @if( $nominated >= 5 )
    <div class="container text-center">
        <p class="alert alert-success ">
            You have already selected 5 Movies! Go To <a href="/movies" class="alert-link">My movies</a> to save your nomination list
        </p>
    </div>
    @endif
    
    @if(session()->has('error-message'))
        <div class="container text-center">
            <p class="alert alert-danger">
            {{session()->get('error-message')}}
            </p>
            
        </div>
    @endif

    @if($movies)
        <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-6 col-lg-3 py-2">
                <div class="card">
                    <img src="{{$movie->Poster}}" onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid"/>
                    <div class="card-body">
                    <p>{{$movie->Title}} ({{$movie->Year}})</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                @if($movie->selected)
                                <small class="text-muted">Nominated</small>
                                @else
                                <a type="button" href="/movies/{{$movie->imdbID}}" class="btn btn-sm btn-outline-success">Nominate</a>                                
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        @if(!$endOfResults)
            <form method="GET" action="/search" class="d-flex justify-center py-2">
                <div class="input-group mb-3">
                    <input type="hidden" name="movieName" id="movieName" value ="{{$movieName}}">
                    <input type="hidden" id="page" name="page" value="{{$page+1}}">
                    <div class="pt-4">
                        <button class="btn btn-primary" type="submit">Load More</button>
                    </div>
                </div>
            </form>
        @else
        <div class="container">
        You have reached the end of the search results
        </div>
        @endif
    @else
    <div class="container text-center">
        <p class="alert alert-secondary ">
            Your search returned no results. Please Try a different name.
        </p>
    </div>
    @endif
    
</div>
</div>
</section>
@endsection
