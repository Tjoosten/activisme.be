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
											<div class="ch-info-front ch-img-1"><i class="fa fa-male" aria-hidden="true"></i></div>
												<div class="ch-info-back">
													<h3><a class="scroll" href="{{ base_url('authencation/register') }}">registeer</a></h3>
												</div>
											</div>
										</div>
									</div>
								</div>

                                @if ($this->user)
                                    <div class="col-md-2 nav-grid nav-grid3">
                                        <div class="ch-item ch-img-1">
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-1"><i class="fa fa-home" aria-hidden="true"></i></div>
                                                    <div class="ch-info-back">
                                                        <h3><a class="scroll" href="">backend</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

								<div class="col-md-2 nav-grid nav-grid2">
									<div class="ch-item ch-img-2">
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
								<div class="col-md-2 nav-grid nav-grid4">
									<div class="ch-item ch-img-4">
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
					<div class="agileabout" id="agileabout">
						<div class="container-fluid">
							<h2>ACTIVISME_BE</h2>

							<div class="agileabout-grids">
								<div class="col-md-6 agileabout-grid agileabout-grid-1">
									<h3>Wie zijn we?</h3>
									<p>
										* We zijn een klein team die opkomt voor wereldvrede en de rechten van de mens en het kind.</br>
										* Wij Zijn actief zowel met web acties als met acties op straat en ludieke vredes acties.</br>
										* Ons platform bestaat uit een klein heel actief team, allemaal vrijwilligers die zich 100% inzetten voor de vele dingen waarvoor we moeten strijden.</br>
										* Wij zijn onafhankelijk van politieke organisaties en andere!</br>
										* Wij worden in leven gehouden door vrijwilligers , eigen financiële inbreng en door giften van mensen die onze organisatie steunen.</br>
										** Activisme_be werd tot stand gebracht door Tom Manhaeghe **
									</p>
								</div>

								<div class="col-md-6 agileabout-grid agileabout-grid-3">
									<h3>Wat doen we?</h3>

									<p>
										* Onze bedoeling is om zowel mensen als organisaties samen te brengen om te strijden voor de belangen van de rechten van de mens en het kind!</br>
 										* Op gebied van internet maken we petities op, eventuele andere online acties met dank aan ons web-team. En die bieden we ook gratis aan voor organisaties die dit willen.</br>
										* Naast activisme hebben we ook een beweging die voedsel, kledij en dringende benodigdheden inzamelt voor de armen, daklozen en mensen in nood. </br>
 										* Wij bieden ook educatieve momenten aan zoals lezingen , vergaderingen enz….</br>
 										** Activisme_be werd tot stand gebracht door Tom Manhaeghe **
									</p>
								</div>

								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="agileabout" id="agileabout">
						<div class="container-fluid">
							<h2>Acties</h2>

							<div align="center">
								<div class="agileabout-grids">
									<div class="col-md-3 agileabout-grid agileabout-grid-1">
										<h3>Petities</h3>

										<ul>
											<a href="http://www.zorgsector.activisme.be/" target="blank">Petitie zorgsector</a></br>
											<a href="http://www.begrotingstekort.activisme.be/" target="blank">Petitie begrotingstekort</a></br>
										</ul>
									</div>

									<div class="col-md-3 agileabout-grid agileabout-grid-2">
										<h3>Mailingacties</h3>

										<ul>
											<a href="http://www.armoede.activisme.be/" target="blank">Mailingactie armoede</a></br>
										</ul>
			  						</div>
		  						</div>

								<div class="col-md-3 agileabout-grid agileabout-grid-3">
									<h3>Manifestaties</h3>

									<ul>
										<a href="manifestaties.html" > klik hier</a></br></li>
									</ul>
								</div>
				 			</div>

							<div class="col-md-3 agileabout-grid agileabout-grid-4">
								<h3>Crowdfund</h3>

								<ul>
									<a href="http://crowdfund.activisme.be" target="blank"> klik hier</a></br></li>
								</ul>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="aitsresumewthree" id="aitsresumewthree">
					<div class="container">
						<div class="aitsresumewthree-tag">
							<h3 class="title">Nieuws en updates</h3>
						</div>

						<div class="load_more">
							<ul id="myList">
								<li class="aitsaitsresumewthreeli-1">
									<div class="l_g">
										<div class="l_g_r g_r">
											<div class="work">
												<div class="work-info">
													<div class="col-md-6 work-grid work-left">
														<h4>03-02- 2017</h4>
													</div>
													<div class="col-md-6 work-grid work-right">
														<h5>Crowdfund caravan</h5>
														<p>De crowdfund pagina voor onze vredes_bedeelcaravan is online geplaatst.</p>
													</div>

													<div class="clearfix"> </div>
												</div>

												<div class="work-info">
													<div class="col-md-6 work-grid work-right work-right2">
														<h4>06-02-2017</h4>
													</div>

													<div class="col-md-6 work-grid work-left work-left2">
														<h5>armoede petitie</h5>
														<p>Liesbeth Homans denkt dat je het met feiten eens of oneens kan zijn. Terwijl feiten gewoonweg feiten zijn, of je ze leuk vindt of niet. De feiten waarmee ze het oneens bleek te zijn. Toevallig zijn net die feiten haar beleidsdomein: de gegevens over armoede in dit land.</p>
													</div>

													<div class="clearfix"> </div>
												</div>

												<div class="work-info">
													<div class="col-md-6 work-grid work-left">
														<h4>27-12-2016</h4>
													</div>

													<div class="col-md-6 work-grid work-right">
														<h5 class="comp">Begroting</h5>
														<p>Aangezien onze regering het geld blijft halen bij de kleine man en toch nog steeds te kort komt. Hebben wij besloten om de regering even te helpen. Met deze speciale petitie proberen wij duidelijk te maken dat er andere manieren zijn. Wij burgers doen het zelf, voel u vrij om de regering een handje toe te steken! </p>
													</div>

													<div class="clearfix"> </div>
												</div>

												<div class="work-info">
													<div class="col-md-6 work-grid work-right work-right2">
														<h4>27-11-2016</h4>
													</div>

													<div class="col-md-6 work-grid work-left work-left2">
														<h5 class="work-info">Zorgsector</h5>
														<p>De diverse diensten zijn gewoon niet op elkaar afgestemd, waardoor je voor het weinige dat je krijgt door een bureaucratisch vagevuur moet, en voor wat je niet ontvangt zelf moet opdraaien. Je medische kosten zijn hoe dan ook al enorm, en de indirecte kosten </p>
													</div>

													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>

							<div class="wow fadeInUp" id="loadMore">Meer <i class="fa fa-chevron-down" aria-hidden="true"></i></div>
							<div class="wow fadeInDown" id="showLess">Minder<i class="fa fa-chevron-up" aria-hidden="true"></i></div>
						</div>
					</div>
				</div>

				<div class="agileabout" id="agileabout">
					<div class="container-fluid">
						<h2>Nuttige Info</h2>

						<div align="center">
							<div class="agileabout-grids">
								<div class="col-md-4 agileabout-grid agileabout-grid-1">
									<h3>Deel onze pagina</h3>

									<ul>
										<a href="http://www.facebook.com/share.php?u=http://www.activisme.be/&title=activisme.be"> facebook  </a></br>
										<a href="http://twitter.com/intent/tweet?status=activisme.be+http://www.activisme.be"> twitter  </a></br>
										<a href="http://www.activisme.be"> linkedin  </a></br>
										<a href="s"> Googleplus  </a></br></li></p>
									</ul>
								</div>

								<div class="col-md-4 agileabout-grid agileabout-grid-2">
									<h3>Volg ons</h3>

									<ul>
										<a href="https://www.facebook.com/ActivismeBE/" target="blank">FB activisme</a></br>
				        				<a href="https://twitter.com/Activisme_be" target="blank">Twitter activisme</a></br>
					  	  				<a href="https://www.facebook.com/tom.manhaeghe.game" target="blank">FB Tom Manhaeghe</a></br>
						  				<a href="https://twitter.com/manhaeghe" target="blank">Twitter Tom Manhaeghe</a></br>
						  				<a href="https://www.flickr.com/photos/activisme/" target="blank">Onze flickr </a></br>
				       					<a href="https://www.youtube.com/channel/UCVL0CgcRZu8fgCKad5Mi9WA" target="blank"> Onze youtube</a></br></p>
									</ul>
			  					</div>
		  					</div>

							<div class="col-md-4 agileabout-grid agileabout-grid-3">
								<h3>Links</h3>

								<ul>
									<a href="https://www.vrede.be/" target="blank"> Vrede.be</a></br>
									<a href="https://www.vredesactie.be/" target="blank"> Vredesactie.be</a></br>
									<a href="http://www.hartbovenhard.be/" target="blank"> Hart boven hard</a></br><a href="http://www.solidarityforall.be" target="blank"> Solidarity for all</a></br>
									<a href="https://www.amnesty-international.be" target="blank"> Amnesty International</a></br>
									<a href="http://msf-azg.be/nl" target="blank"> Artsen zonder grenzen</a></br></li>
								</ul>
							</div>

							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="footer">
					<div class="container">
						<div class="copyright slideanim">
						<p>&copy; {{ date('Y') }} Activisme.be. Alle rechten voorbehouden. </p>
					</div>
				</div>
			</div>

			<a href="#" id="toTop" class="stuoyal3w stieliga" style="display: block;"> <span id="toTopHover" style="opacity: 0;"> </span></a>

			<script type="text/javascript" src="{{ base_url('assets/js/jquery-2.1.4.min.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/easyResponsiveTabs.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/waypoints.min.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/counterup.min.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/jquery.filterizr.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/controls.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/jquery.chocolat.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/owl.carousel.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/move-top.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/easing.js') }}"></script>
			<script type="text/javascript" src="{{ base_url('assets/js/index.js') }}"></script>
		</body>
	</html>
