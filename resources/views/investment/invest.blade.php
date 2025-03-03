<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cushon Task</title>

    </head>
    <body class="antialiased">
        <form action="http://localhost/cushontask/public/investtransact" method="POST">
            <label for="fund">Select Fund: </label><br>
            <select name="fund" id="fund">
                @foreach ($funds as $fund)
                    <option value="{{$fund->id}}">{{$fund->name}}</option><br>
                @endforeach
            </select><br>
            <label for="invest_value">Investment Value: </label><br>
            <input type="number" id="invest_value" name="invest_value" min="1" max="{{$account->balance}}"><br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="submit" value="Invest in this fund">
        </form>
    </body>
</html>
