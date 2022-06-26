<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ __('panel.site_title') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
        @stack('styles')
    </head>
    <body class="text-blueGray-700 bg-blueGray-800 antialiased">
        <div>
        {{ $slot }}
        </div>
        @livewireScripts
        @yield('scripts')
        @stack('scripts')
    </body>
</html>



