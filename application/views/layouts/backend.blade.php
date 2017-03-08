<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ActivismeBE">
        <meta name="author" content="Tom Manhaeghe">

        <title>ActivismeBE | {{ $title }}</title>

        <link rel="icon" href="{{ base_url('assets/favicon.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/font-awesome.min.js') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/bootswatch.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/ie10-viewport-bug-workaround.css') }}">
        <link rel="stylesheet" href="{{ base_url('assets/css/master-backend.css') }}">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries. --}}
        <!-- [if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ base_url() }}">Activisme_BE</a>
                </div>

                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="">Manifestaties</a></li>
                        <li><a href="">Nieuws</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ $this->user['name'] }} ({{ $this->user['username'] }}) <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <script src="{{ base_url('assets/js/jquery-2.1.4.min.js') }}"></script>
        <script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
    </body>
</html>
