<!DOCTYPE html>
<html>

@include('templates.partials.head')

<body>
@include('templates.partials.navbar')

    @yield('content')


@include('templates.partials.footer')
@include('templates.partials.script')

</body>

</html>
