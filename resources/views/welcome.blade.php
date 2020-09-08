@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
    <div class="container">
        <h1 class="jumbotron-heading display-4 ">Search OMDB Movies</h1>
        <p class="h2 lead text-muted">
            This Webpage enables you to make and share a list of your top 5 favourite movies. <br>
            You can view recent suggestions made by others as well.
        </p>
    </div>
    <div class="album py-5 bg-light">
        <div class="container justify-content-center">
        <form method="GET" action="/search">
            <label>Enter your favourite movie's name below</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="movieName" id="movieName" placeholder="Movie Name">
                <input type="hidden" id="page" name="page" value="1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Search OMDB</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection