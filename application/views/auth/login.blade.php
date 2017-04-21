<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Activisme | Login</title>
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
        <form method="POST" action="{{ base_url('authencation/verify') }}">
            <h1>Login</h1>

            {{ validation_errors() }}

            <section>
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" placeholder="E-mail"/>
            </section>
            <section>
                <label for="paswoord">Wachtwoord:</label>
                <input type="password" id="password" name="password" placeholder="Password"/>
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
