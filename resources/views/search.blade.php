@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">


<div class="album bg-light">
<div class="container justify-content-center">
    <form method="GET" action="/search" class="py-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="movieName" id="movieName" value = {{$movieName}}>
            <input type="hidden" id="page" name="page" value="1">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Search OMDB</button>
                </div>
        </div>
    </form>

    <div class="row">
    @if($movies)    
        @foreach($movies as $movie)
            <div class="col-md-6 col-lg-3 py-2">
                <div class="card">
                    <img src={{$movie->Poster}} class="card-img-top img-fluid"/>
                    <div class="card-body">
                    <p>{{$movie->Title}} ({{$movie->Year}})</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a type="button" href="/" class="btn btn-sm btn-outline-info">View</a>
                                <a role="button" href="/" class="btn btn-sm btn-outline-info">Edit</a>
                            </div>
                        <small class="text-muted"></small>
                        </div>
                    </div>
                </div>
            </div>
            
        @endforeach
    @else
    not found
    @endif
    </div>
</div>
</div>
</section>
@endsection
