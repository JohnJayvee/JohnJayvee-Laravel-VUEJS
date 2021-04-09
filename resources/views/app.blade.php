<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 8 & MySQL CRUD Tutorial</title>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div id="app" class="container">
        <router-view></router-view>
    </div>
    <script src="{{ mix('js/app.js') }}">
    </script>
</body>

</html>
