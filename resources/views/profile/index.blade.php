@extends('templates.defaults')
@section('content')
    <div class="row p-5" >
        <div class="col-lg-5">
             @include('user.userblock')
            <hr>
            @if (!$statuses->count())
                <p>there no status on you timeline</p>
            @else

                @foreach($statuses as $status)
                    <div class="media ">
                        <a href="{{ route('profile.index', ['username'=> $status->user->username]) }}" class="pull-left"></a>
                        <img src="{{ $status->user->getAvatarUrl() }}" alt="">
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{ route('profile.index', ['username'=>$status->user->username])}}">{{ $status->user->getNameOrUsername()}}</a></h4>
                            <p class="list-inline">{{$status->body  }}</p>
                            <ul class="list-inline">
                                <span>{{ $status->created_at->diffForHumans()}}</span>
                                        @if()

                                            <span><a href="" style="color: red;">likes</a></span>
                                            <span style="color: red;" > </span>
                                        @endif

                            </ul>

                            @foreach($status-> replies as $reply)
                                <div class="card m-3">
                                    <div class="card-body m-3">
                                        <div class="media">
                                            <a href="{{ route('profile.index', ['username'=> $reply->user->username]) }}" class="pull-left"></a>
                                            <img src="{{ $reply->user->getAvatarUrl() }}" alt="">
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="{{ route('profile.index', ['username'=>$reply->user->username])}}">{{ $reply->user->getNameOrUsername()}}</a></h4>
                                                <p class="list-inline">{{$reply->body  }}</p>
                                                <ul class="list-inline">
                                                    <span>{{ $reply->created_at->diffForHumans()}}</span>
                                                                                                    @if()

                                                                                                        <span><a href="">likes</a></span>
                                                                                                        <span></span>
                                                                                                    @endif
                                                </ul>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div>

                        @if($authUserIsFriend || Auth::user()->id === $status->user->id)
                            <form role="form" action="{{route('status.reply', ['statusId' =>$status->id])}}" method="POST">
                                @csrf
                                <div class="mb-3">

                                    <textarea class="form-control" name="reply-{{ $status->id }}" rows="5" style="background: none" placeholder="reply to this status"></textarea>
                                </div>
                                @error('reply-{$status->Id}')
                                <span class="form-text text-danger">{{$message}}</span>
                                @enderror
                                <input type="submit" value="reply" class="btn btn-default btn-sm" style="background: red">

                            </form>
                            @endif
                    </div>

                @endforeach

            @endif
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
