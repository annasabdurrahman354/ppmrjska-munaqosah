<!DOCTYPE html>
<html>
   <head>
      <title>Plotingan Munaqosah</title>
       @livewireStyles
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
   </head>
   <body>
    {{ $slot }}
    @yield('scripts')
    @stack('scripts')
    @yield('styles')
    @stack('styles')
    @livewireScripts
   </body>
</html>