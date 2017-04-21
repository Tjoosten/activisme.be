<!DOCTYPE html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Index site for activisme_be">
		<meta name="author" content=Activisme_BE"">

		<title>Activisme_be | {{ $title }}</title>

		<link href="{{ base_url('assets/favicon.ico') }}" rel="icon">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{ base_url('assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">
		<link href="{{ base_url('assets/css/backend.css') }}" rel="stylesheet">

		{{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  	</head>

  	<body class="padding-body">

    	<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            			<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
          			</button>

					<a class="navbar-brand" href="{{ base_url() }}">Activisme_be</a>
        		</div>
        		<div id="navbar" class="collapse navbar-collapse">
          			<ul class="nav navbar-nav">
            			<li><a href="{{ base_url('backend') }}">Menu items</a></li>
            			<li><a href="{{ base_url('users') }}">Gebruikers</a></li>
            			<li><a href="{{ base_url('volunteer/index') }}">Vrijwilligers</a></li>
          			</ul>

          			<ul class="nav navbar-nav navbar-right"> {{-- user menu --}}
              			<li class="dropdown">
                  			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								{{ $this->user['name'] }} ({{ $this->user['username'] }}) <span class="caret"></span>
                  			</a>

							<ul class="dropdown-menu">
								<li><a href="{{ base_url('account/settings') }}">Account instellingen</a></li>
								<li><a href="{{ base_url('authencation/logout') }}">Uitloggen</a></li>
							</ul>
              			</li>
          			</ul> {{-- /User meni --}}
        		</div>{{--/.nav-collapse --}}
      		</div>
    	</nav>

    	<div class="container">
			@if ($this->session->flashdata('class') && $this->session->userdata('message')) {{-- Flash session --}}
				<div class="row">
					<div class="col-sm-12">
						<div class="{{ $this->session->flashdata('class') }}" role="alert">
							{{ $this->session->userdata('message') }}
						</div>
					</div>
				</div>
			@endif {{-- /Flash session --}}

			@yield('content')
  		</div>{{-- /.container --}}

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>
		<script src="{{ base_url('assets/js/ajax.js') }}"></script>
  	</body>
</html>
