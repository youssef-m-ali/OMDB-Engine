@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">


<div class="album bg-light">
<div class="container justify-content-center">
<form method="GET" action="/search" class="py-2">
<div class="input-group mb-3">
    <input type="text" class="form-control" name="movieName" id="movieName" value = {{$movieName}}>
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">Search OMDB</button>
        </div>
</div>
</form>

<div class="row">
@foreach($movies as $movie)
    <div class="col-md-6 col-lg-3 py-2">
        <div class="card">
            <div class="card-header text-center">
                <p>{{$movie->Title}}</p>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a type="button" href="/pis}" class="btn btn-sm btn-outline-info">View</a>
                        <a role="button" href="/pisedit" class="btn btn-sm btn-outline-info">Edit</a>
                    </div>
                <small class="text-muted"></small>
                </div>
            </div>
        </div>
    </div>
    
@endforeach
</div>
</div>
</div>
</section>
@endsection
