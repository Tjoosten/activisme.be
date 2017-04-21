<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activisme | {{ $title }}</title>
        <link rel="stylesheet" href="{{ base_url('assets/css/header.css') }}"/>
        <link rel="stylesheet" href="{{ base_url('assets/css/footer.css') }}"/>
        <link rel="stylesheet" href="{{ base_url('assets/css/connection.css') }}"/>
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
        <form method="POST" action="{{ base_url('volunteer/store') }}">
            <h1>Word vrijwilliger</h1>

            {{ validation_errors() }}

            <section style="margin-bottom: 5px;">
                <label for="name">Naam:</label>
                <input style="width: 196px;" type="text" id="Naam" name="name" placeholder="Uw naam">
            </section>
            <section style="margin-bottom: 5px;">
                <label for="email">E-mail:</label>
                <input style="width: 196px;" type="text" id="email" name="email" placeholder="E-mail"/>
            </section>
			<section style="margin-bottom: 5px;">
				<label for="regio">Woonplaats:</label>
				<select style="width: 200px;" name="city_id" id="regio">
					<option value=""> -- Stad --</option>

					@foreach ($cities as $city)
						<option value="{{ $city->id }}">{{ $city->postal_code }} - {{ $city->city_name }}</option>
					@endforeach
				</select>
			</section>
            <section>
                <label for="submit"></label>
                <input style="width: 200px;" type="submit" id="submit" value="Registreer"/>
            </section>
        </form>
    </main>
    <footer>
        @include('layouts/includes/front-end-footer')
    </footer>
    </body>
</html>
