<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cushon Task</title>

    </head>
    <body class="antialiased">
        <form action="http://localhost/cushontask/public/login" method="POST">
            <label for="username">Username: </label><br>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password: </label><br>
            <input type="password" id="password" name="password"><br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="submit" value="login">
        </form>
    </body>
</html>
