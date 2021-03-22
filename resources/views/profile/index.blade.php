@extends('templates.defaults')
@section('content')
    <div class="row p-5" >
        <div class="col-lg-5">
             @include('user.userblock')
            <hr>
        </div>
        <div col-5>
            @if(!$user->friends()->count())
                <p style="color: red;">{{ $user->getNameOrUsername() }} has no friends</p>
            @else
                @foreach($user->friends() as $user)
                    @include('user.userblock')

                @endforeach
            @endif

        </div>
    </div>
@endsection
