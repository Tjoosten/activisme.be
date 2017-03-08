<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Activisme | Tom Manhaeghe </title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="keywords" content="Opulent a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">

        <link rel="stylesheet" href="{{ base_url('assets/css/bootstrap.min.css') }}"	type="text/css" media="all">
        <link rel="stylesheet" href="{{ base_url('assets/css/style.css') }}" 			type="text/css" media="all">
        <link rel="stylesheet" href="{{ base_url('assets/css/font-awesome.min.css') }}"	type="text/css" media="all">
        <link rel="stylesheet" href="{{ base_url('assets/css/chocolat.css') }}"			type="text/css" media="all">
        <link rel="stylesheet" href="{{ base_url('assets/css/owl.carousel.css') }}"		type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700" 				type="text/css" media="all">
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900"	type="text/css" media="all">
    </head>
    <body>
    	<div class="header" id="agilehome">
    		<img src="{{ base_url('assets/images/header.jpg') }}" alt="Opulent">

    		<h1>ACTIVISME_BE</h1>
    		<h2> - <span>TOM MANHAEGHE</span> - </h2>


			<div class="navigation">
				<div class="nav-grids">
					<div class="ch-grid">
						<div class="col-md-2 nav-grid nav-grid1">
							<div class="ch-item ch-img-1">
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front ch-img-1"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
										<div class="ch-info-back">
											<h3><a class="scroll" href="index.html">HOME</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 nav-grid nav-grid2">
							<div class="ch-item ch-img-2">
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front ch-img-1"><i class="fa fa-male" aria-hidden="true"></i></div>
										<div class="ch-info-back">
											<h3><a class="scroll" href="register.html">registeer</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2 nav-grid nav-grid5">
							<div class="ch-item ch-img-5">
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front ch-img-1"><i class="fa fa-users" aria-hidden="true"></i></div>
										<div class="ch-info-back">
											<h3><a class="scroll" href="login.html">Log In</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-md-2 nav-grid nav-grid5">
                            <div class="ch-item ch-img-5">
                                <div class="ch-info-wrap">
                                    <div class="ch-info">
                                        <div class="ch-info-front ch-img-1"><i class="fa fa-home" aria-hidden="true"></i></div>
                                        <div class="ch-info-back">
                                            <h3><a class="scroll" href="{{ base_url('backend') }}">Backend</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-2 nav-grid nav-grid6">
							<div class="ch-item ch-img-6">
								<div class="ch-info-wrap">
									<div class="ch-info">
										<div class="ch-info-front ch-img-1"><i class="fa fa-phone" aria-hidden="true"></i></div>
										<div class="ch-info-back">
											<h3><a class="scroll cont" href="mailto:info@activisme.be">CONTACT</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="aitsresumewthree" id="aitsresumewthree">
			<div class="container">
				<h3>Registreer U</h3>
				<p></p>

                <div class="alert alert-info" role="alert">
                    <p>Hier kunt u een login aanmaken die zal gebruikt doorheen onze platformen.</p>
                </div>

				<div align="center">
					<table width="500" border="0">
						<tr>
							<td>Naam:</td>
							<td><input style="margin-bottom: 5px;" type="text" class="form-control" placeholder="Name" name="name"></td>
						</tr>
						<tr>
							<td>Gebruikersnaam:</td>
							<td><input style="margin-bottom: 5px;" type="text" class="form-control" placeholder="Gebruikersnaam" name="username"></td>
						</tr>
						<tr>
							<td>E-mail:</td>
							<td><input style="margin-bottom: 5px;" type="email" class="form-control" placeholder="Email" required="" name="email"></td>
						</tr>
						<tr>
							<td>Paswoord:</td>
							<td><input style="margin-bottom: 5px;" type="password" class="form-control" placeholder="Password" name="password"></td>
						</tr>
						<tr>
							<td>Bevestig paswoord:</td>
							<td><input style="margin-bottom: 5px;" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="btn btn-sm btn-success" value="Registreer"></td>
						</tr>
					</table>
				</div>
			</div>
		</div>


		<!-- Footer -->
		<div class="footer">
			<div class="container">

				<div class="copyright slideanim">
					<p>&copy; {{ date('Y') }} Activisme.be. Alle rechten voorbehouden </p>
				</div>
			</div>
		</div>

        <a href="#" id="toTop" class="stuoyal3w stieliga" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>

		<script type="text/javascript" src="{{ base_url('assets/js/jquery-2.1.4.min.js') }}"></script>
	    <script type="text/javascript" src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/jquery.filterizr.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/controls.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/easyResponsiveTabs.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/waypoints.min.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/counterup.min.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/bars.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/move-top.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/easing.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/jquery.chocolat.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ base_url('assets/js/register.js') }}"></script>
    </body>
</html>
