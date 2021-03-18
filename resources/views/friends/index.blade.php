@extends('templates.defaults')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-6">
                <p>your friends</p>

                @if(!$friends->count())
                    <p style="color: red;"> has no friends</p>
                @else
                    @foreach($friends as $user)
                        @include('user.userblock')

                    @endforeach
                @endif
            </div>
            <div class="col-6">
                <p>friends requests</p>
                @if(!$requests->count())
                    <p style="color: red;"> your have  no friends</p>
                @else
                    @foreach($requests as $user)
                        @include('user.userblock')

                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
