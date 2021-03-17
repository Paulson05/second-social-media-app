<!DOCTYPE html>
<html>

@include('templates.partials.head')

<body>
<div class="container pt-5">
    @include('templates.partials.navbar')

    @yield('content')


</div>
@include('templates.partials.footer')
@include('templates.partials.script')


</body>

</html>
