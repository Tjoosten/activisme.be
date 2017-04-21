<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activisme | registreer</title>
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

            <form method="POST" action="{{ base_url('authencation/store') }}">
                <h1>Registreer</h1>

                {{ validation_errors() }}

                <section>
                    <label for="naam">Naam:</label>
                    <input type="text" name="name" id="naam" placeholder="Naam"/>
                </section>
                <section>
                    <label for="gebruikersnaam">Gebruikersnaam:</label>
                    <input type="text" name="username" id="gebruikersnaam" placeholder="Gebruikersnaam"/>
                </section>
                <section>
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" id="email" placeholder="E-mail"/>
                </section>
                <section>
                    <label for="paswoord">Paswoord:</label>
                    <input type="text" id="paswoord" name="password" placeholder="Paswoord"/>
                </section>
                <section>
                    <label for="bevestigPaswoord">Bevestig Paswoord:</label>
                    <input type="text" name="password_confirmation"i d="bevestigPaswoord" placeholder="Bevestig Paswoord"/>
                </section>
                <section>
                    <label for="submit">Registreer</label>
                    <input type="submit" id="submit" value="Registreer"/>
                </section>
            </form>
        </main>
        <footer>
			@include('layouts/includes/front-end-footer')
        </footer>
    </body>
</html>
