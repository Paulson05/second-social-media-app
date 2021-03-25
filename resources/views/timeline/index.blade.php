@extends('templates.defaults')
@section('content')
    <div class="container p-5">
          <div class="row">
               <div class="col-lg-6">
                   @include('templates.partials.alert')
                   <form role="form" action="{{route('timeline.index')}}" method="POST">
                       @csrf
                     <textarea placeholder="what up {{Auth::user()->getFirstNameOrUsername()}}?" rows="3" class="form-control" name="status" ></textarea>
                       @error('status')
                       <span class="alert alert-primary">{{$errors->first('status')}}</span>
                       @enderror
                       <button class="btn btn-success btn-sm m-5" type="submit">update status</button>
                   </form>

               </div>
          </div>
        <div class="row" >
            <div class="col-lg-6">
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

                                                   </ul>


                                               </div>

                                           </div>
                                       </div>
                                   </div>
                                @endforeach

                            </div>

                        </div>
                        <div>

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
                        </div>

                    @endforeach

                @endif
            </div>

        </div>
    </div>
@endsection
