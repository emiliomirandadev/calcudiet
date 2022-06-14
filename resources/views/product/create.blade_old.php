<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'calcudiet') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
    <div class="grid grid-rows-1 grid-cols-2">
        <form action={{ route('products.store') }} method="post" enctype="multipart/form-data" >
            <div>
            <label for="Name"> Name </label>
            <input type="text" name="name" id="name" >
            </div>
            <div>
            <label for="Kcal"> Kcal </label>
            <input type="number" name="kcal" id="kcal" >
            </div>
            <div>
            <label for="Grams"> Grams </label>
            <input type="number" name="grams" id="grams" >
            </div>
            <div>
            <label for="Comment"> Comment </label>
            <input type="text" name="name" id="name" >
            </div>
            <div>
            <label for="Photo"> Photo </label>
            <input type="text" name="name" id="name" >
            </div>
        </form>
    </div>
</body>
</html>