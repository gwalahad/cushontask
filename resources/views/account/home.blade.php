<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cushon Task</title>

    </head>
    <body class="antialiased">
        <div>
            <h1>Name: {{$user->firstname}} {{$user->lastname}}</h1>
            <h2>Uninvested Balance: {{$account->balance}}</h2>
            <h3 title="{{$product->description}}">Product: {{$product->name}}</h3><br>
            <div>
                <h3>Current Investments:</h3>
                @foreach ($investments as $investment)
                    <span>Investment Name: {{$investment->fund_name}}, Balance: {{$investment->balance}}</span><br>
                @endforeach
            </div>
        </div>
        <br>
        <form action="http://localhost/cushontask/public/invest" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="submit" value="Make an Investment">
        </form>
    </body>
</html>
