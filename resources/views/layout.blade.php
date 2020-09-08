<!doctype html>
<html lang="en">
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>OMDb Search Engine</title>
    </head>

    <body class="bg-light">
        <header>
            <nav class="navbar navbar-dark bg-info py-3">
            <a class="navbar-brand px-3" href="/"> EngineOMDb</a>
                <div class="float-right navbar ">
                    <a class="navbar-brand px-3" href="/nominations">View Nominations</a>
                    <a class="navbar-brand px-3" href="/movies">My movies</a>
                    </div>
                </div>
            </nav>
        </header>

        <main role="main">
            @yield('content')
        </main>
        <footer class="footer text-muted bg-dark py-5">
            <div class="container">
                <p class="text-white px-5">Youssef Ali 2020. All Rights Reserved</p>
                <small class="text-white px-5">Developed With Love For Shopify</small>
            </div>
        </footer>
    </body>
</html>
