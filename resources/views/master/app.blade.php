<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/assets/css/app.css" type="text/css">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>{{config('app.name')}}</title>
    @yield('head')
</head>
<body>
    @include('master.navbar')
    <div id="test" class="w-full">
        @yield('content')
    </div>
    @include('master.footer')
    @yield('js')
</body>
</html>
