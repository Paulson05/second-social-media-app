@extends('templates.defaults')
@section('content')
    <h3 class="pt-5">you search for "{{Request::input('query')}}"</h3>
    <div class="row">
        <div class="col-4">
            @foreach($users as $user)
                @include('user.userblock')

            @endforeach
        </div>
    </div>
@endsection
