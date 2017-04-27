<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activisme | Tom Manhaeghe - {{ $title }}</title>
        <link rel="stylesheet" href="{{ base_url('assets/css/header.css') }}"/>
        <link rel="stylesheet" href="{{ base_url('assets/css/footer.css') }}"/>
        <link rel="stylesheet" href="{{ base_url('assets/css/index.css') }}"/>
    </head>
    <body>
        <header>
            <nav>
				@include('layouts/includes/front-end-navigation')
            </nav>
            <section>
                <h1>ACTIVISME_BE</h1>
                <h3>TOM MANHAEGHE</h3>
            </section>
        </header>

        <main>
            <section class="informatie">
                <h1>Over ons</h1>
                <section>
                    <h2>Wie zijn we?</h2>
                    <ul>
                        <li>We zijn een klein team die opkomt voor wereldvrede en de rechten van de mens en het kind.</li>
                        <li>Wij Zijn actief zowel met web acties als met acties op straat en ludieke vredes acties.</li>
                        <li>Ons platform bestaat uit een klein heel actief team, allemaal vrijwilligers die zich 100% inzetten voor de vele dingen waarvoor we moeten strijden.</li>
                        <li>Wij zijn onafhankelijk van politieke organisaties en andere!</li>
                        <li>Wij worden in leven gehouden door vrijwilligers , eigen financiële inbreng en door giften van mensen die onze organisatie steunen.</li>
                    </ul>
                </section>
                <section>
                    <h2>Wat doen we?</h2>
                    <ul>
                        <li>Onze bedoeling is om zowel mensen als organisaties samen te brengen om te strijden voor de belangen van de rechten van de mens en het kind!</li>
                        <li>Op gebied van internet maken we petities op, eventuele andere online acties met dank aan ons web-team. En die bieden we ook gratis aan voor organisaties die dit willen.</li>
                        <li>Naast activisme hebben we ook een beweging die voedsel, kledij en dringende benodigdheden inzamelt voor de armen, daklozen en mensen in nood. </li>
                        <li>Wij bieden ook educatieve momenten aan zoals lezingen , vergaderingen enz….</li>
                    </ul>
                </section>
            </section>

            <section class="acties">
                <h1>Acties</h1>
                <section>
                    <h2>Petities</h2>
                    <ul>
						@if ((int) count($petitions) === 0)
							<li><a href="#">{{ strtoupper('Geen petities.') }}</a></li>
						@else
							@foreach ($petitions as $petition)
								<li><a href="{{ $petition->link }}" target="blank">{{ strtoupper($petition->name) }}</a></li>
							@endforeach
						@endif
                    </ul>
                </section>
                <section>
                    <h2>Mailingacties</h2>
                    <ul>
                        @if ((int) count($mailingActions) === 0)
							<li><a href="#">{{ strtoupper('Geen acties.') }}</a></li>
						@else
							@foreach ($mailingActions as $mailing)
								<li><a href="{{ $mailing->link }}" target="blank">{{ strtoupper($mailing->name) }}</a></li>
							@endforeach
						@endif
                    </ul>
                </section>
                <section>
                    <h2>Manifestaties</h2>
                    <ul>
                        @if ((int) count($manifestations) === 0)
							<li><a href="#">{{ strtoupper('Geen manifestaties.') }}</a></li>
						@else
							@foreach ($manifestations as $manifestation)
								<li><a href="{{ $manifestation->link }}" target="blank">{{ strtoupper($manifestation->name) }}</a></li>
							@endforeach
						@endif
                    </ul>
                </section>
                <section>
                    <h2>Crowdfund</h2>
                    <ul>
                        @if ((int) count($crowdfunds) === 0)
							<li><a href="#">{{ strtoupper('Geen crowdfunds.') }}</a></li>
						@else
							@foreach ($crowdfunds as $crowdfund)
								<li><a href="{{ $crowdfund->link }}" target="blank">{{ strtoupper($crowdfund->name) }}</a></li>
							@endforeach
						@endif
                    </ul>
                </section>
            </section>

            <section class="agenda">
                <h1>Nieuws en updates</h1>
                <section>
                    <h2>Wij maken een bedeel caravan</h2>
                    <p>
                        Met een overheid die steeds minder gul datgene steunt wat veel steun nodig heeft, wordt crowdfunding de enige uitweg. We zijn een tijdje geleden gestart met een caravan, die het land afreist als mobiel inzamelpunt voor kledij, dekens, voedsel, dat we dan uitdelen aan daklozen.
                        <br><br>
                        Het effect van dit initiatief is enorm: we maken echt het verschil voor mensen die volledig achtergelaten zijn door een kouder wordende overheid. En terwijl dit een relatief goedkope operatie is, kost ze niettemin een beetje geld. de caravan moet hersteld en her aangekleed worden, en de hele operatie breidt zich voortdurend uit.
                        <br><br>
                        We hebben dan ook jullie steun nodig. En zelfs kleine giften helpen. Ze maken bovendien een direct verschil. Ze tonen bovendien aan dat deze samenleving weigert mee te lopen in een beleid dat steeds meer mensen naar de marge verwijst. Niet alleen wij zijn jullie daarvoor dankbaar.
                    </p>
                    <p>
                        Ga naar de <a href="{{ base_url('Caravan') }}" target="blank">crowdfund pagina</a> voor meer informatie.
                    </p>
                </section>
            </section>
        </main>

        <footer>
			@include('layouts/includes/front-end-footer')
        </footer>
    </body>
</html>
